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
use App\Mail\VerifyEmailSend;
use App\Models\Address;
use App\Models\PaySlip;

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
        $code = rand(100000, 999999);
        $userObj = User::where('email', request('email'))->first();
        if (!$userObj) {
            $userObj = new User;
            $userObj->email = $request->email;
            $userObj->is_completed = '0';
        }
        $userObj->code = $code;
        if ($userObj->save()) {
            if ($userObj->is_completed == '0') {
                $mailData = [];
                $mailData['name'] = $request->email;
                $mailData['otp'] = $code;
                $mailData['type'] = 'E-mail Verification';
                $mailData['subject'] = 'Verify E-mail';
                Mail::to($userObj->email)->send(new VerifyEmailSend($mailData));
            }
        }
        $response['is_completed'] = $userObj->is_completed;
        $response['data'] = User::select('email')->find($userObj->id);
        $response['success'] = TRUE;
        $response['message'] = "Verification code sent successfully";
        $response['status'] = STATUS_OK;

        return response()->json($response, $response['status']);
    }

    public function loginWithOtp(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;
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

    public function getUserProfile(Request $request)
    {
        $response['success'] = TRUE;
        $response['data'] =  User::select('name', 'email')->find($request->user()->id);;
        $response['message'] = "Profile update successfully";
        $response['status'] = STATUS_OK;

        return response()->json($response, $response['status']);
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

        $user  = User::find($request->user()->id);
        if (!$user) {
            $response['message'] = "User doesn't exist.";
            return response()->json($response, 301);
        }

        $user->name = $request->uname ?? '';
        $user->is_completed = "1";
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            $response['success'] = TRUE;
            $response['is_completed'] = $user->is_completed;
            $response['message'] = "Profile update successfully";
            $response['status'] = STATUS_OK;
        }
        return response()->json($response, $response['status']);
    }

    public function updateUserProfile(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;

        $rules = [
            'uname' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
        ];

        $messages = [
            'uname.required' => 'The username cannot be empty.',
            'uname.min' => 'Username has at least 3 characters.',
            'email.required' => 'The email cannot be empty.',
            'email.email' => 'Please enter valid email.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response, 301);
        }

        $user  = User::find($request->user()->id);
        if (!$user) {
            $response['message'] = "User doesn't exist.";
            return response()->json($response, 301);
        }

        $user->name = $request->uname ?? '';

        $user->email = $request->email;
        if ($user->save()) {
            $response['success'] = TRUE;
            $response['message'] = "Profile update successfully";
            $response['status'] = STATUS_OK;
        }
        return response()->json($response, $response['status']);
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
        if (!Hash::check($request->password, $user->password)) {
            $response['message'] = "Incorrect password.";
            return response()->json($response, 301);
        }
        $user->save();
        Auth::login($user);
        $response['token'] = $user->createToken($user->id . ' token ')->accessToken;
        $response['success'] = TRUE;
        $response['is_completed'] = $user->is_completed;
        $response['message'] = "Login successfully";
        $response['status'] = STATUS_OK;
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

    public function deactivateAccount(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;
        try {
            DB::beginTransaction();

            $dataObj = User::deactivateAccount($request);
            $response['message'] = $dataObj['message'];
            if ($dataObj['status'] == 200) {
                $response['success'] = TRUE;
                $response['status'] = STATUS_OK;
            }
        } catch (\Exception $e) {
            DB::rollback();
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        DB::commit();
        return response()->json($response, $response['status']);
    }

    public function restoreAccount(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;
        try {
            DB::beginTransaction();
            $rules = [
                'username' => 'required|max:255',
                'password' => 'required|min:6'
            ];

            $messages = [
                'required' => 'The :attribute field is required.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                $response['status'] = UNPROCESSABLE_ENTITY;
                return $response;
            }
            $dataObj = User::restoreAccount($request);
            $response['message'] = $dataObj['message'];
            if ($dataObj['status'] == 200) {
                $response['success'] = TRUE;
                $response['status'] = $dataObj['status'];
            }
        } catch (\Exception $e) {
            DB::rollback();
            unset($response['data']);
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        DB::commit();
        return response()->json($response, $response['status']);
    }

    public function deleteAccount(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;

        try {
            DB::beginTransaction();
            $dataObj = User::deleteAccount($request);
            $response['message'] = $dataObj['message'];
            if ($dataObj['status'] == 200) {
                $response['success'] = $dataObj['success'];
                $response['status'] = $dataObj['status'];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        DB::commit();
        return response()->json($response, $response['status']);
    }

    public function accountUpdate(Request $request)
    {
        $response = [];
        $response['success'] = FALSE;
        $response['status'] = STATUS_BAD_REQUEST;

        $requestData = $request->all();
        $userObj = User::find(Auth::user()->id);
        if (!$userObj) {
            $response['message'] = "User doesn't exist.";
            return response()->json($response, 301);
        }
        if ($requestData['type'] == 'name') {
            $rules = [
                'name' => 'required|min:3',
            ];

            $messages = [
                'name.required' => 'The name cannot be empty.',
                'uname.min' => 'Name has at least 3 characters.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                return response()->json($response, 301);
            }
            $userObj->name = $request->name;
            $msg = "Name has updated successfully";
        }

        if ($requestData['type'] == 'email') {
            $rules = [
                'password' => 'required',
                'email' => 'required|email:rfc,dns|unique:users,email'
            ];

            $messages = [
                'email.required' => 'The email cannot be empty.',
                'email.unique' => 'Please enter another email.',
                'email.email' => 'Please enter valid email.',
                'password.required' => 'The password cannot be empty'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                return response()->json($response, 301);
            }
            if (!Hash::check($request->get('password'), $userObj->password)) {
                $response['message'] = WRONG_PASSWORD;
                $response['status'] = STATUS_BAD_REQUEST;
                return $response;
            }
            $userObj->email = $request->email;
            $msg = "Please check your mail.";
        }

        if ($requestData['type'] == 'password') {
            $rules = [
                'current_password' => 'required',
                'password' => 'required|confirmed|min:8'
            ];

            $messages = [
                'current_password.required' => "Password can't be empty.",
                'password.required' => "Password can't be empty.",
                'password.confirmed' => "Confirm password doesn't match",
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                return response()->json($response, 301);
            }

            if (!Hash::check($request->get('current_password'), $userObj->password)) {
                $response['message'] = WRONG_PASSWORD;
                $response['status'] = STATUS_BAD_REQUEST;
                return $response;
            }
            $userObj->password = Hash::make($requestData['password']);
            $msg = "Password has updated successfully";
        }
        if ($userObj->save()) {
            $user = User::select('name', 'email')->where('id', Auth::user()->id)->first();
        }

        if ($requestData['type'] == 'delete') {
            PaySlip::where(['user_id' => Auth::user()->id])->forceDelete();
            Address::where(['user_id' => Auth::user()->id])->forceDelete();
            $userObj->forceDelete();
            $request->user()->token()->revoke();
            $msg = ACCOUNT_DELETED_SUCCESSFULLY;
            $user = '';
        }
        $response['data'] = $user;
        $response['success'] = TRUE;
        $response['message'] = $msg;
        $response['status'] = STATUS_OK;
        return response()->json($response, $response['status']);
    }

    public function addressBook(Request $request){

        try{
            $response = [];
            $response['success'] = FALSE;
            $response['status'] = STATUS_BAD_REQUEST;

            $rules = [
                'type'      => 'required',
                'name'      => 'required|min:3',
                'address_1' => 'required|min:3',
                'city'      => 'required|min:3',
                'state'     => 'required|min:3',
                'zip_code'       => 'required|min:3',
            ];

            $messages = [
                'required' => 'The :attribute cannot be empty.',
                'min'      => 'The :attribute atleast in single word.',
                'type.in'  => 'The type is invalid.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                return response()->json($response, 301);
            }
            $requestData = $request->all();
            $userObj = User::find(Auth::user()->id);
            if (!$userObj) {
                $response['message'] = "User doesn't exist.";
                return response()->json($response, 301);
            }

            $addressObj             = new Address;
            $addressObj->user_id    = Auth::user()->id;
            $addressObj->type       = $requestData['type'];
            $addressObj->name       = $requestData['name'];
            $addressObj->tel        = $requestData['tel'] ?? '';
            $addressObj->address_1  = $requestData['address_1'];
            $addressObj->address_2  = $requestData['address_2'] ?? '';
            $addressObj->city       = $requestData['city'];
            $addressObj->state      = $requestData['state'];
            $addressObj->zip_code   = $requestData['zip_code'];
            if($addressObj->save()){
                $response['success'] = TRUE;
                $response['message'] = "Address saved successfully";
                $response['status'] = STATUS_OK;
            }
        }catch (\Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }

    public function editAddress(Request $request){

        try{
            $response = [];
            $response['success'] = FALSE;
            $response['status'] = STATUS_BAD_REQUEST;

            $rules = [
                'address_id'        => 'required',
                'type'      => 'required',
                'name'      => 'required|min:3',
                'address_1' => 'required|min:3',
                'city'      => 'required|min:3',
                'state'     => 'required|min:3',
                'zip_code'       => 'required|min:3',
            ];

            $messages = [
                'required' => 'The :attribute cannot be empty.',
                'min'      => 'The :attribute atleast in single word.',
                'type.in'  => 'The type is invalid.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                return response()->json($response, 301);
            }
            $requestData = $request->all();
            $userObj = User::find(Auth::user()->id);
            if (!$userObj) {
                $response['message'] = "User doesn't exist.";
                return response()->json($response, 301);
            }

            $addressObj = Address::where(['id'=>$requestData['address_id'],'user_id'=>Auth::user()->id])->first();
            if(!$addressObj){
                $response['message'] = "Address doesn't exist.";
                return response()->json($response, 301);
            }
            $addressObj->user_id    = Auth::user()->id;
            $addressObj->type       = $requestData['type'];
            $addressObj->name       = $requestData['name'];
            $addressObj->tel        = $requestData['tel'] ?? '';
            $addressObj->address_1  = $requestData['address_1'];
            $addressObj->address_2  = $requestData['address_2'] ?? '';
            $addressObj->city       = $requestData['city'];
            $addressObj->state      = $requestData['state'];
            $addressObj->zip_code   = $requestData['zip_code'];
            if($addressObj->save()){
                $response['success'] = TRUE;
                $response['message'] = "Address updated successfully";
                $response['status'] = STATUS_OK;
            }
        }catch (\Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }

    public function getAddress(Request $request){

        try{
            $response = [];
            $response['success'] = FALSE;
            $response['status'] = STATUS_BAD_REQUEST;

            $employerList = Address::where(['type'=>'employer','user_id'=>Auth::user()->id])->orderBy('id','desc')->get();
            $employeeList = Address::where(['type'=>'employee','user_id'=>Auth::user()->id])->orderBy('id','desc')->get();
            
                $response['success'] = TRUE;
                $response['employerList'] = $employerList;
                $response['employeeList'] = $employeeList;
                $response['message'] = "Address fetch successfully";
                $response['status'] = STATUS_OK;
            
        }catch (\Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }

    public function addressDelete(Request $request){

        try{
            $response = [];
            $response['success'] = FALSE;
            $response['status'] = STATUS_BAD_REQUEST;

            $rules = [
                'address_ids'      => 'required',
            ];

            $messages = [
                'required' => 'The :attribute cannot be empty.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                return response()->json($response, 301);
            }
            $requestData = $request->all();
            $userObj = User::find(Auth::user()->id);
            if (!$userObj) {
                $response['message'] = "User doesn't exist.";
                return response()->json($response, 301);
            }
            $address_ids = explode(',', $requestData['address_ids']);
            $isDeleted = Address::whereIn('id', $address_ids)->delete();

            if($isDeleted){
                $response['success'] = TRUE;
                $response['message'] = "Address deleted successfully";
                $response['status'] = STATUS_OK;
            }
        }catch (\Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }
}
