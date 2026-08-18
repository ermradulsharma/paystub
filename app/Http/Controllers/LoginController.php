<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmailSend;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function loginWithGoogle(Request $request)
    {
        try {
            return \Laravel\Socialite\Facades\Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            Log::error('Google OAuth Redirect Error: ' . $e->getMessage());
            return redirect()->route('welcome')->with('error', 'Unable to redirect to Google Login.');
        }
    }

    /**
     * Handle Google Callback for both Socialite and JS GIS Token Payload.
     */
    public function callbackFromGoogle(Request $request)
    {
        try {
            // Always verify Google authentication via Socialite OAuth state/code token
            $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->user();
            $email = filter_var($googleUser->getEmail(), FILTER_SANITIZE_EMAIL);
            $socialId = $googleUser->getId();
            $name = $googleUser->getName();
            $firstName = $googleUser->user['given_name'] ?? $name;
            $lastName = $googleUser->user['family_name'] ?? '';
        } catch (\Exception $e) {
            Log::error('Google Callback OAuth Error: ' . $e->getMessage());
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Invalid Google authentication response.'], 400);
            }
            return redirect()->route('welcome')->with('error', 'Google authentication failed.');
        }

        if (empty($email)) {
            return response()->json(['message' => 'Email address is required from Google.'], 422);
        }

        $existUser = User::where('social_id', $socialId)->orWhere('email', $email)->first();

        if (! $existUser) {
            $existUser = new User();
            $existUser->email = $email;
            $existUser->password = Hash::make(\Illuminate\Support\Str::random(32));
        }

        $existUser->social_id = $socialId;
        $existUser->first_name = $firstName;
        $existUser->last_name = $lastName;
        $existUser->name = $name ?? ($firstName . ' ' . $lastName);
        $existUser->is_completed = '1';
        $existUser->save();

        Auth::login($existUser, true);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'message' => 'Login successfully',
                'data' => $existUser->name,
                'user_type' => $existUser->role_id == 1 ? 'Admin' : 'User',
            ], 200);
        }

        return redirect()->route('welcome')->with('message', 'Login successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect(route('welcome'));
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ];

        $messages = [
            'email.required' => 'The email cannot be empty.',
            'email.email' => 'Please enter valid email.',
            'password.required' => 'The password cannot be empty',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();

            return response()->json($response, 301);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('email', $request->email)->first();
            $response['user'] = $user;
            $response['message'] = 'Login successfully';

            return response()->json($response, 200);
        } else {
            $response['message'] = 'Incorrect password';

            return response()->json($response, 301);
        }
    }

    public function loginWithOtp(Request $request)
    {
        Log::info($request);
        $rules = [
            'email' => 'required|email:rfc,dns',
            'code' => 'required|min:4',
        ];

        $messages = [
            'email.required' => 'The email cannot be empty.',
            'email.email' => 'Please enter valid email.',
            'code.required' => 'The Verification code cannot be empty',
            'code.min' => 'Verification code has at least 4 digit',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();

            return response()->json($response, 301);
        }
        $user = User::where(['email' => $request->email, 'code' => $request->code])->first();
        if (! $user) {
            $response['message'] = 'Entered wrong verification code.';

            return response()->json($response, 301);
        }
        $user->code = null;
        $user->email_verified_at = Carbon::now();
        $user->save();

        Auth::login($user); //

        $response['message'] = 'Login successfully';
        $response['user_type'] = $user->role_id == 1 ? 'Admin' : 'User';
        $response['firstName'] = $user->name ?? '';

        return response()->json($response, 200);
    }

    public function sendOtp(Request $request)
    {
        $rules = [
            'email' => 'required|email:rfc,dns',
        ];

        $messages = [
            'email.required' => 'The email cannot be empty.',
            'email.email' => 'Please enter valid email.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();

            return response()->json($response, 301);
        }
        $code = rand(100000, 999999);
        if (request('formType') == 'verifyOtpChangeMail') {
            $user = User::where('temp_mail', request('email'))->first();
            if ($user->temp_mail != '') {
                $mailData = [];
                $mailData['name'] = $request->temp_mail;
                $mailData['otp'] = $code;
                $mailData['type'] = 'E-mail Verification';
                $mailData['subject'] = 'Verify E-mail';
                Mail::to($user->temp_mail)->send(new VerifyEmailSend($mailData));
            }

            $user->code = $code;
            $user->save();
            $response['message'] = 'Verification code sent successfully';
        } else {
            $user = User::where('email', request('email'))->first();
            if (! $user) {
                $user = new User;
                $user->email = $request->email;
                $user->is_completed = '0';
            }

            if ($user->is_completed == '0') {
                if ($user->email != '') {
                    $mailData = [];
                    $mailData['name'] = $request->email;
                    $mailData['otp'] = $code;
                    $mailData['type'] = 'E-mail Verification';
                    $mailData['subject'] = 'Verify E-mail';
                    Mail::to($user->email)->send(new VerifyEmailSend($mailData));
                }

                $user->code = $code;
                $user->save();
                $response['message'] = 'Verification code sent successfully';
            }
            $response['email'] = $user->email;
            $response['role'] = $user->role_id;
            $response['type'] = $user->is_completed;
        }

        return response()->json($response, 200);
    }
}
