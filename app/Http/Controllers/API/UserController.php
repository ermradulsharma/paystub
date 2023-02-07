<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        $code = 1234; // ?? rand(1000, 9999);
        $user  = User::where('email', request('email'))->first();
        if (!$user) {
            $user = new User;
            $user->email = $request->email;
        }

        $user->code = $code;
        if ($user->save()) {
            $response['data'] = User::select('email')->find($user->id);
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
            $response['message'] = "Login successfully";
            $response['status'] = STATUS_OK;
        }
        DB::commit();
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
}
