<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Mail\VerifyEmailSend;
use App\Models\PaySlip;
use App\Models\StateTax;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function userDetails(Request $request)
    {
        $userId = Auth::id();
        if (! $userId) {
            return redirect()->route('login');
        }
        $userObj = User::find($userId);
        if (! $userObj) {
            return redirect()->route('login');
        }
        $subcriptionData = Subscription::with('plan')->where('user_id', $userObj->id)->where('device_type', 'website')->orderBy('id', 'asc')->get();
        $stateList = StateTax::select('state', 'state_code')->get();

        return view('user-profile', compact('userObj', 'subcriptionData', 'stateList'));
    }

    public function storeDetails(Request $request)
    {
        $userId = Auth::id();
        if (! $userId) {
            return response()->json(['error' => ['Unauthorized']], 401);
        }
        $userObj = User::find($userId);

        if ($request->type == 'user-name') {
            $validator = Validator::make($request->all(), [
                'uname' => 'required|min:3',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all(),
                ]);
            }
            $userObj = User::find($userObj->id);
            if (! $userObj) {
                return response()->json(['error' => ['User not found']]);
            }
            $userObj->name = $request->uname ?? '';
            if (! $userObj->save()) {
                return response()->json(['error' => ['Something went wrong.']]);
            }
            $userObj = User::find($userObj->id);
            session()->flash('message', 'Profile updated successfully.');

            return response()->json(['user' => $userObj, 'message' => 'Profile updated successfully.']);
        }

        if ($request->type == 'user-email') {
            $rules = [
                'password' => 'required',
                'email' => 'required|email:rfc,dns|unique:users,email',
            ];

            $messages = [
                'email.required' => 'The email cannot be empty.',
                'email.unique' => 'Please enter another email.',
                'email.email' => 'Please enter valid email.',
                'password.required' => 'The password cannot be empty',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();

                return response()->json($response, 301);
            }
            $user = User::find($userId);
            if ($user) {
                if (! Hash::check($request->get('password'), $user->password)) {
                    $response['message'] = 'Oops! you have entered wrong password. Please try again.';
                    $response['status'] = 301;

                    return response()->json($response, $response['status']);
                }
                $code = rand(100000, 999999);
                $user->temp_mail = $request->email;
                if ($user->temp_mail != '') {
                    $mailData = [];
                    $mailData['name'] = $request->email;
                    $mailData['otp'] = $code;
                    $mailData['type'] = 'E-mail Verification';
                    $mailData['subject'] = 'Verify E-mail';
                    Mail::to($request->email)->send(new VerifyEmailSend($mailData));
                }
                $user->code = $code;
                if ($user->save()) {
                    $response['message'] = 'Verification code sent successfully';
                    $response['status'] = 200;
                    $response['data'] = User::find($userId);
                    $response['type'] = 'verifyOtpChangeMail';

                    return response()->json($response, $response['status']);
                }
            } else {
                $response['message'] = 'This e-mail already exists. Please use another mail.';

                return response()->json($response, 301);
            }
        }

        if ($request->type == 'verifyOtpChangeMail') {
            $rules = [
                'code' => 'required',
                'email' => 'required|email:rfc,dns',
            ];

            $messages = [
                'email.required' => 'The email cannot be empty.',
                'email.email' => 'Please enter valid email.',
                'code.required' => 'The OTP cannot be empty',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();

                return response()->json($response, 301);
            }
            $userObj = User::where(['temp_mail' => $request->email, 'code' => $request->code])->first();
            if ($userObj) {
                $userObj->email = $request->email;
                $userObj->code = '';
                $userObj->temp_mail = '';
                $userObj->save();

                $user = User::select('name', 'email', 'temp_mail')->where('id', $userObj->id)->first();
                $response['message'] = 'OTP Verify Successfully';
                $response['status'] = 200;
                $response['data'] = $user;
                $response['type'] = 'resend';

                return response()->json($response, $response['status']);
            }
        }

        if ($request->type == 'resendOtp') {
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
            $userObj = User::where(['temp_mail' => $request->email])->first();
            if ($userObj) {
                $code = rand(100000, 999999);
                if ($userObj->temp_mail != '') {
                    $mailData = [];
                    $mailData['name'] = $request->email;
                    $mailData['otp'] = $code;
                    $mailData['type'] = 'E-mail Verification';
                    $mailData['subject'] = 'Verify E-mail';
                    Mail::to($request->email)->send(new VerifyEmailSend($mailData));
                }
                $userObj->code = $code;
            }
            $userObj->save();
            $user = User::select('name', 'email')->where('id', $userId)->first();
            $response['message'] = 'OTP Send Successfully. Please check your e-mail';
            $response['status'] = 200;
            $response['data'] = $user;

            return response()->json($response, $response['status']);
        }

        if ($request->type == 'verify-email') {

            $userObj = User::where('id', $userId)->first();
            if (! $userObj) {
                return response()->json(['error' => ['User not found']]);
            }

            if ($userObj->code != $request->code) {
                return response()->json(['error' => ['You entered wrong otp.']]);
            }
            $userObj->email = $request->email;

            if (! $userObj->save()) {
                return response()->json(['error' => ['Something went wrong.']]);
            }

            return response()->json(['message' => 'Email updated successfully.']);
        }

        if ($request->type == 'user-password') {

            $validator = Validator::make($request->all(), [
                'currentPassword' => 'required',
                'password' => 'required|min:8|confirmed|different:currentPassword',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all(),
                ]);
            }
            $userObj = User::where('id', $userId)->first();
            if (! $userObj) {
                return response()->json(['error' => ['User not found']]);
            }
            if (! Hash::check($request->currentPassword, $userObj->password)) {
                return response()->json(['error' => ['Please enterd correct password.']]);
            }
            $userObj->password = bcrypt($request->password);
            if (! $userObj->save()) {
                return response()->json(['error' => ['Something went wrong.']]);
            }
            session()->flash('message', 'Password changed successfully.');

            return response()->json(['message' => 'Password changed successfully.']);
        }

        if ($request->type == 'setup-account') {
            $rules = [
                'uname' => 'required|min:3',
                'password' => 'required|min:8|confirmed',
            ];

            $messages = [
                'uname.required' => 'The name cannot be empty.',
                'uname.min' => 'Please enter atleast 3 charcters.',
                'password.min' => 'The password must be 8 charcters',
                'password.required' => "Password can't be empty.",
                'password.confirmed' => "Confirm password doesn't match",
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                $response['status'] = 400;

                return response()->json($response, 400);
            }
            $userObj = User::where('id', $userId)->first();
            if (! $userObj) {
                return response()->json(['error' => ['User not found']]);
            }
            $userObj->name = $request->uname ?? '';
            $userObj->password = bcrypt($request->password);
            $userObj->is_completed = '1';
            if ($userObj->save()) {
                // Auth::login($userObj);
                $response['data'] = $userObj->name ?? '';
                $response['message'] = 'Your account setup successfully.';
                $response['status'] = STATUS_OK;

                return response()->json($response, $response['status']);
            }
        }
    }

    public function updatePassword(Request $request)
    {
        $requestData = $request->all();

        return response()->json([$requestData]);
    }

    public function changePassword(Request $request)
    {
        $response = [];
        $response['success'] = false;
        $requestData = $request->all();

        $rules['new_password'] = 'required|min:8';
        $rules['confirm_password'] = 'required|min:8';
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('profile')->withErrors($validator)->withInput();
        }
        $requestData = $request->all();
        $user = $request->user();
        if (! $user) {
            return redirect()->route('login');
        }
        $userId = $user->id;
        $userObj = User::find($userId);
        if ($userObj) {
            $userObj->password = bcrypt($requestData['new_password']);
            $userObj->save();
        }
        $response['success'] = true;
        $response['status'] = STATUS_OK;

        return redirect()->back()->with('message', 'Password changed successfully');
    }

    public function accountDelete(Request $request)
    {
        try {
            $user = User::find(Auth::id());
            if (! $user) {
                Auth::logout();

                return redirect()->route('welcome')->with('message', 'Account not found.');
            }
            PaySlip::where(['user_id' => $user->id])->forceDelete();
            Auth::logout();

            if ($user->delete()) {
                return redirect()->route('welcome')->with('message', 'Your account has been deleted!');
            }
            // Fallback if delete fails
            return redirect()->route('welcome')->with('error', 'Failed to delete account.');
        } catch (\Exception $e) {
            Log::info('User Delete Function', ['Exception' => $e->getMessage()]);

            return redirect()->route('profile')->with('error', 'Something went wrong.');
        }
    }

    public function contactForm(Request $request)
    {
        try {

            $rules = [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'w3review' => 'required',
            ];

            $messages = [
                'name.required' => 'First name is required.',
                'w3review.required' => 'Message is required.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();

                return back()->with('error', $response['message']);
            }

            $mailData = [];
            $mailData['name'] = $request->name;
            $mailData['email'] = $request->email;
            $mailData['message'] = $request->w3review;
            $mailData['subject'] = 'Contact Form';
            Mail::to('paystubxlogger@gmail.com')->send(new ContactForm($mailData));

            return back()->with('message', 'Your feedback send successfully to the Paystubx Team.');
        } catch (\Exception $e) {
            Log::info('User Delete Function', ['Exception' => $e->getMessage()]);

            return back()->with('error', 'Something went wrong.');
        }
    }
}
