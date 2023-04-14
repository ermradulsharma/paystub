<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subcription;
use App\Models\Address;
use App\Models\PaySlip;
use App\Models\StateTax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerifyEmailSend;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $userObj = User::find(Auth::user()->id);
        $subcriptionData = Subcription::with('plan')->where('user_id', $userObj->id)->orderBy('id', 'desc')->first();
        $stateList = StateTax::select('state', 'state_code')->get();
        return view('user-profile', compact('userObj', 'subcriptionData', 'stateList'));
    }

    public function storeDetails(Request $request)
    {
        $userId = Auth::user()->id;
        if ($request->type == 'user-name') {
            $validator = Validator::make($request->all(), [
                'uname' => 'required|min:3',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }
            $userObj = User::where('id', $userId)->first();
            if (!$userObj) {
                return response()->json(['error' => ['User not found']]);
            }
            $userObj->name = $request->uname ?? '';
            if (!$userObj->save()) {
                return response()->json(['error' => ['Something went wrong.']]);
            }
            $userObj = User::where('id', $userId)->first();
            $request->session()->flash('message', 'Profile updated successfully.');
            return response()->json(['user' => $userObj, 'message' => 'Profile updated successfully.']);
        }

        if ($request->type == 'user-email') {
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

            $userObj = User::where('id', $userId)->first();
            if (!$userObj) {
                $response['message'] = 'User not found';
                return response()->json($response, 301);
            }

            if (!Hash::check($request->password, $userObj->password)) {
                return response()->json(['error' => ['Password is incorrect.']]);
            }

            if ($request->email === $userObj->email) {
                return response()->json(['error' => ['Please enter different email.']]);
            }

            $code = rand(100000, 999999);
            $mailData = [];
            $mailData['name'] = $request->email;
            $mailData['otp'] = $code;
            $mailData['type'] = 'E-mail Verification';
            $mailData['subject'] = 'Verify E-mail';
            \Mail::to($request->email)->send(new VerifyEmailSend($mailData));

            $userObj->code = $code;
            if (!$userObj->save()) {
                return response()->json(['error' => ['Something went wrong.']]);
            }

            $response['message'] = "Verification code sent successfully";
            $response['email'] = $request->email;
            return response()->json($response, $response['status']);
        }

        if ($request->type == 'verify-email') {

            $userObj = User::where('id', $userId)->first();
            if (!$userObj) {
                return response()->json(['error' => ['User not found']]);
            }

            if ($userObj->code != $request->code) {
                return response()->json(['error' => ['You entered wrong otp.']]);
            }
            $userObj->email = $request->email;

            if (!$userObj->save()) {
                return response()->json(['error' => ['Something went wrong.']]);
            }
            return response()->json(['message' => 'Email updated successfully.']);
        }

        if ($request->type == 'user-password') {

            $validator = Validator::make($request->all(), [
                'currentPassword' => 'required|min:6',
                'password' => 'required|min:6|confirmed|different:currentPassword',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }
            $userObj = User::where('id', $userId)->first();
            if (!$userObj) {
                return response()->json(['error' => ['User not found']]);
            }
            if (!Hash::check($request->currentPassword, $userObj->password)) {
                return response()->json(['error' => ['Please enterd correct password.']]);
            }
            $userObj->password = bcrypt($request->password);
            if (!$userObj->save()) {
                return response()->json(['error' => ['Something went wrong.']]);
            }
            $request->session()->flash('message', 'Password changed successfully.');
            return response()->json(['message' => 'Password changed successfully.']);
        }

        if ($request->type == 'setup-account') {
            $validator = Validator::make($request->all(), [
                'uname' => 'required|min:3',
                'password' => 'required|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }
            $userObj = User::where('id', $userId)->first();
            if (!$userObj) {
                return response()->json(['error' => ['User not found']]);
            }
            $userObj->name = $request->uname ?? '';
            $userObj->password = bcrypt($request->password);
            $userObj->is_completed = '1';
            if ($userObj->save()) {
                // Auth::login($userObj);
                $response['data'] = $userObj->name ?? '';
                $response['message'] = "Your account setup successfully.";
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
        $response['success'] = FALSE;
        $requestData = $request->all();

        $rules['new_password'] = 'required|min:6';
        $rules['confirm_password'] = 'required|min:6';
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('profile')->withErrors($validator)->withInput();
        }
        $requestData = $request->all();
        $userId = $request->user()->id;
        $userObj = User::find($userId);
        $userObj->password = bcrypt($requestData['new_password']);
        $userObj->save();
        $response['success'] = TRUE;
        $response['status'] = STATUS_OK;
        return redirect()->back()->with('message', 'Password changed successfully');
    }

    public function accountDelete(Request $request)
    {

        try {
            $user = User::find(Auth::user()->id);
            PaySlip::where(['user_id' => Auth::user()->id])->forceDelete();
            Auth::logout();
            if ($user->delete()) {
                return redirect()->route('welcome')->with('message', 'Your account has been deleted!');
            }
        } catch (\Exception $e) {
            Log::info('User Delete Function', array('Exception' => $e->getMessage()));
            return redirect()->route('profile')->with('error', 'Something went wrong.');
        }
    }
}
