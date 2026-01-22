<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\ForgotPasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {

        $response = [];
        try {
            DB::beginTransaction();
            $rules = [
                'email' => 'required|email:rfc,dns',
            ];
            $messages = [
                'required' => 'The :attribute field is required.',
                'email.email' => 'Please enter valid email address.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all(),
                ]);
            }

            $userObj = User::where('email', strtolower($request->get('email')))->first();
            if (! $userObj) {
                return response()->json([
                    'error' => ['Email id does not exist.'],
                ]);
            }

            $token = generateRandomToken(50, $request->get('email'));
            $tokenMailObj = ForgotPasswordMail::where('email', $request->get('email'))->first();
            if (! $tokenMailObj) {
                $tokenMailObj = new ForgotPasswordMail;
            }
            $tokenMailObj->email = $request->get('email');
            $tokenMailObj->token = $token;
            $currentTime = date('Y-m-d H:i:s');
            $mailExpireTime = date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($currentTime)));

            $tokenMailObj->expired_at = $mailExpireTime;
            $tokenMailObj->save();

            $mailData = [];
            $mailData['name'] = $userObj->first_name.' '.$userObj->last_name ?? '';

            $mailData['link'] = route('password.reset', [$token, 'email' => $request->get('email')]);

            // Mail::to($request->user()->email)->send(new ForgotPassword($mailData));
            Mail::to($request->email)->send(new ForgotPassword($mailData));
            DB::commit();
            $request->session()->flash('message', 'Please check your email to reset password.');

            return response()->json(['message' => 'Please check your email to reset password.']);
        } catch (\Exception $e) {
            DB::rollBack();
            $response['message'] = $e->getMessage().' Line No '.$e->getLine().' in File'.$e->getFile();
            Log::error($e->getTraceAsString());

            return response()->json([
                'error' => [$response['message']],
            ]);
        }

        return response()->json(['message' => 'Please check your email to reset password.']);
    }

    public function resetPasswordFromWeb($token)
    {
        $userObj = ForgotPasswordMail::firstWhere('token', $token);
        if (! is_null($userObj)) {
            if ($userObj->isExpire()) {
                return redirect()->route('welcome')->with('error', 'Link has been expired or Invalid');
            } else {
                $data['token'] = $token;

                return view('auth.passwords.reset', compact('data'));
            }
        } else {
            return redirect()->route('welcome')->with('error', 'Link has been expired or Invalid');
        }
    }

    public function passwordUpdate(Request $request, $token)
    {

        $validated = $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        $expiry = Carbon::now()->subMinutes(3);

        $userObj = ForgotPasswordMail::firstWhere('token', $token);
        if (! is_null($userObj)) {
            if ($userObj->isExpire()) {
                return redirect()->route('welcome')->with('error', 'Link has been expired or Invalid');
            } else {

                $user = User::firstWhere('email', $userObj->email);
                $user->password = bcrypt($request->password) ?? $userObj->password;
                $user->save();
                $userObj->delete();

                return redirect()->route('welcome')->with('message', 'Your password updated successfully');
            }
        } else {
            return redirect()->route('welcome')->with('error', 'Link has been expired or Invalid');
        }
    }
}
