<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\verifiedEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function loginWithGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function callbackFromGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        //$user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->id)->first();
        if ($finduser) {
            Auth::login($finduser);
        } else {
            $newUser = User::updateOrCreate(['email' => $user->email], [
                'name' => $user->name,
                'google_id' => $user->id,
                'password' => Hash::make('123456dummy')
            ]);
            Auth::login($newUser);
        }
        return redirect(route('invoiceList'));
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
        Auth::login($user);
        $response['message'] = "Login successfully";
        $response['user_type'] = $user->role_id == 1 ? 'Admin' : 'User';
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
        $code = 1234; // ?? rand(1000, 9999);
        $user  = User::where('email', request('email'))->first();
        if (!$user) {
            $user = new User;
            $user->email = $request->email;
        }

        $user->code = $code;
        $user->save();
        $response['message'] = "Verification code sent successfully";
        $response['email'] = $user->email;
        $response['type'] = $user->role_id;
        return response()->json($response, 200);
    }
}
