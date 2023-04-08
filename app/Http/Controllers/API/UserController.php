<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UserController extends Controller
{
    public function sendOtp(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;
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
        // $code =  rand(100000, 999999);
        $code = 1234; // ?? rand(1000, 9999);
        $user  = User::where('email', request('email'))->first();
        if (!$user) {
            $user = new User;
            $user->email = $request->email;
        }

        $user->code = $code;
        if ($user->save()) {
            $response['is_completed'] = $user->is_completed;
            $response['data'] = User::select('email',)->find($user->id);
            $response['success'] = TRUE;
            $response['message'] = "Verification code sent successfully";
            $response['status'] = STATUS_OK;
        }
        return response()->json($response, 200);
    }

    public function loginWithOtp(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;
        Log::info($request);
        DB::beginTransaction();
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
        if ($user->save()) {
            $response['token'] = $user->createToken($user->id . ' token ')->accessToken;
            $response['success'] = TRUE;
            $response['is_completed'] = $user->is_completed;
            $response['message'] = "Login successfully";
            $response['status'] = STATUS_OK;
        }
        DB::commit();
        return response()->json($response, 200);
    }

    public function updateProfile(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;

        $rules = [
            'uname' => 'required|min:3',
            'password' => 'required|min:6',
        ];

        $messages = [
            'uname.required' => 'The username cannot be empty.',
            'uname.min' => 'Username has at least 3 characters.',
            'password.required' => 'The Password code cannot be empty',
            'password.min' => 'Password has at least 6 characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response, 301);
        }

       $user  = User::find(Auth::user()->id);
        if (!$user) {
            $response['message'] = "User not exist.";
            return response()->json($response, 301);
        }

        $user->first_name = $request->uname ?? '';
        $user->is_completed = "1";
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            $response['success'] = TRUE;
            $response['is_completed'] = $user->is_completed;
            $response['message'] = "Profile update successfully";
            $response['status'] = STATUS_OK;
        }
        return response()->json($response, 200);
    }

    public function loginWithPassword(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;
        Log::info($request);
        DB::beginTransaction();
        $rules = [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:6'
        ];

        $messages = [
            'email.required' => 'The email cannot be empty.',
            'email.email' => 'Please enter valid email.',
            'password.required' => 'The Password code cannot be empty',
            'password.min' => 'Password has at least 6 characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response, 301);
        }
        $user  = User::where(['email' => $request->email])->first();
        if (!$user) {
            $response['message'] = "Email doesn't exist.";
            return response()->json($response, 301);
        }
        if(!Hash::check($request->password, $user->password)){
            $response['message'] = "Incorrect password.";
            return response()->json($response, 301);
        }
        Auth::login($user);
        $user->save();
        $response['token'] = $user->createToken($user->id . ' token ')->accessToken;
        $response['success'] = TRUE;
        $response['is_completed'] = $user->is_completed;
        $response['message'] = "Login successfully";
        $response['status'] = STATUS_OK;

        return response()->json($response, 200);
    }

    public function socialLogin(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;
        try {
            $post_data = $request->all();
            $isNewAccount = FALSE;
            $rules = [
                'email' => 'required|email:rfc,dns',
                'social_id' => 'required'
            ];

            $messages = [
                'email.required' => 'The email cannot be empty.',
                'email.email' => 'Please enter valid email.',
                'social_id.required' => 'The social id cannot be empty',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                return response()->json($response, 301);
            }
            $email_exist = User::where('email', $post_data['email'])->count();
            if ($email_exist) {
                $userObj = User::where('email', $post_data['email'])->first();
                $social_id_exist = User::where('email', $post_data['email'])->where('social_id', $post_data['social_id'])->count();
                if (!$social_id_exist) {
                    $userObj->social_id = $post_data['social_id'];
                    $userObj->save();
                }
            } else {
                $isNewAccount = TRUE;
                $userObj = new User;
                $userObj->social_id = $post_data['social_id'];
                $userObj->email = $post_data['email'];
                $userObj->save();
            }
            $userObj->device_token = $post_data['device_token'] ?? "";
            $userObj->email_verified_at = Carbon::now();
            $userObj->is_completed = '1';
            $userObj->device_type = $post_data['device_type'] ?? "";
            if ($userObj->save()) {
                $response['token'] = $userObj->createToken($userObj->id . ' token ')->accessToken;
                $response['message'] = "Login successfully";
                $response['success'] = TRUE;
                $response['status'] = STATUS_OK;
            }
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, 200);
    }
    public function forgotPassword(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;
        try {
            DB::beginTransaction();
            
            $rules = [
                'email' => 'required|email:rfc,dns',
            ];
            $messages = [
                'required' => 'The :attribute field is required.',
                'email.email' => 'Please enter valid email address.'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                return response()->json($response, 301);
            }

            $userObj = User::where('email', strtolower($request->get('email')))->first();
            if (!$userObj) {
                return response()->json([
                    'error' => ["Email id does not exist."],
                ]);
            }

            $token = generateRandomToken(50, $request->get('email'));
            $tokenMailObj = ForgotPasswordMail::where('email', $request->get('email'))->first();
            if (!$tokenMailObj) {
                $tokenMailObj = new ForgotPasswordMail;
            }
            $tokenMailObj->email = $request->get('email');
            $tokenMailObj->token = $token;
            $currentTime = date("Y-m-d H:i:s");
            $mailExpireTime = date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($currentTime)));

            $tokenMailObj->expired_at = $mailExpireTime;
            $tokenMailObj->save();

            $mailData = [];
            $mailData['name'] = $userObj->first_name . ' ' . $userObj->last_name ?? '';

            $mailData['link'] = route('password.reset', [$token, 'email' => $request->get('email')]);

            Mail::to($request->email)->send(new ForgotPassword($mailData));
            
            DB::commit();

            $response['message'] = 'Please check your email to reset password.';
            $response['success'] = TRUE;
            $response['status'] = STATUS_OK;

        } catch (\Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }
    public function logout(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;

        try {
            $userObj = User::find(Auth::user()->id);
            $userObj->device_token = ""; 
            $userObj->device_type = "";
            if ($userObj->save()) {
                $user = Auth::user()->token();
                $user->revoke();

                $response['message'] = 'User Logout Successfully';
                $response['success'] = TRUE;
                $response['status'] = STATUS_OK;
            }
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }
}
