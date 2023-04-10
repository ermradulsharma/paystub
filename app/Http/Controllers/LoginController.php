<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmailSend;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
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
        //
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function callbackFromGoogle(Request $request)
    {
        $existUser = User::where(['social_id' => $request->sub])->exists();
        if (!$existUser) {
            $existUser = User::where(['email' => $request->email])->first();
            if (!$existUser) {
                $existUser = new User;
                $existUser->email = $request->email;
                $existUser->password = Hash::make('123456dummy');
            }
            $existUser->social_id = $request->sub;
            $existUser->first_name = $request->given_name;
            $existUser->last_name = $request->family_name;
            $existUser->name = $request->name;
            $existUser->is_completed = '1';
            if ($existUser->save()) {
                Auth::login($existUser);
                $response['message'] = "Login successfully";
            }
        } else {
            $existUser = User::where(['social_id' => $request->sub])->first();
            Auth::login($existUser);
        }
        $response['data'] = $existUser->name;
        $response['message'] = "Login successfully";
        return response()->json($response, 200);
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
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'The email cannot be empty.',
            'email.email' => 'Please enter valid email.',
            'password.required' => 'The password cannot be empty'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response, 301);
        }

        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
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
            'code' => 'required|min:4'
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
        $user  = User::where(['email' => $request->email, 'code' => $request->code])->first();
        if (!$user) {
            $response['message'] = "Entered wrong verification code.";
            return response()->json($response, 301);
        }
        $user->code = null;
        $user->email_verified_at = Carbon::now();
        $user->save();

        Auth::login($user); //

        $response['message'] = "Login successfully";
        $response['user_type'] = $user->role_id == 1 ? 'Admin' : 'User';
        $response['firstName'] = $user->first_name ?? '';
        return response()->json($response, 200);
    }



    public function sendOtp(Request $request)
    {
        $rules = [
            'email' => 'required|email:rfc,dns',
        ];

        $messages = [
            'email.required' => 'The email cannot be empty.',
            'email.email' => 'Please enter valid email.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response, 301);
        }
        $code = rand(100000, 999999);
        $user  = User::where('email', request('email'))->first();
        if (!$user) {
            $user = new User;
            $user->email = $request->email;
            $user->is_completed = '0';
        }

        if ($user->is_completed == '0') {
            if ($user->email != "") {
                $mailData = [];
                $mailData['name'] = $request->email;
                $mailData['otp'] = $code;
                $mailData['type'] = 'E-mail Verification';
                $mailData['subject'] = 'Verify E-mail';
                Mail::to($user->email)->send(new VerifyEmailSend($mailData));
            }

            $user->code = $code;
            $user->save();
            $response['message'] = "Verification code sent successfully";
        }

        /* $moreData = [
            "otp" => $code
        ];
        $mailData = [
            "email" => $request->email,
            "title" => "Verification code"
        ];
        Mail::send('mail.verify', $moreData, function ($message) use ($mailData) {
            $message->to($mailData['email']);
            $message->subject($mailData['title']);
        }); */


        $response['email'] = $user->email;
        $response['type'] = $user->is_completed;
        return response()->json($response, 200);
    }

    // public function loginWithGoogle(Type $var = null)
    // {
    //     # code...
    // }

}
