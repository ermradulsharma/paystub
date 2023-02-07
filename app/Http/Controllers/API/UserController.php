<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
            $response['success'] = TRUE;
            $response['message'] = "Verification code sent successfully";
            $response['status'] = STATUS_OK;
        }
        return response()->json($response, 200);
    }

    public function loginWithOtp(Request $request){

    }
}
