<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(Request $request)
    {
        // dd('setting index');
        if ($request->isMethod('GET')) {

            $data = [];
            $data['page_title'] = 'Settings';

            $settingObj = Setting::first();
            $settings = $settingObj['settings'] ?? [];

            $smtpSetting = Setting::where('name', 'smtp')->first();
            $smtp = $smtpSetting->value ?? '[]';
            $smtp = json_decode($smtp, true);

            $appSetting = Setting::where('name', 'app')->first();
            $app = $appSetting->value ?? '[]';
            $app = json_decode($app, true);

            $notificationObj = Setting::where('name', 'push_notification_server_key')->first();
            $notification = $notificationObj->value ?? '[]';
            $notification = json_decode($notification, true);

            $currencyObj = Setting::where('name', 'paypal_configuration')->first();
            $currencyObj = $currencyObj->value ?? '[]';
            $currencyData = json_decode($currencyObj, true);

            $userObj = User::find(Auth::id());

            $currencies = Currency::pluck('name', 'name')->all();

            return view('Admin.setting')->with(compact('data', 'settings', 'smtp', 'notification', 'currencies', 'currencyData', 'userObj'));
        }

        try {
            $requestData = $request->all();

            $rules = [];
            $settingData = [];

            if ($requestData['request_type'] == 'change_password') {
                $rules['old_password'] = 'required|min:6';
                $rules['password'] = 'required|min:6|confirmed';
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {

                    return redirect()->route('settings')->withErrors($validator)->withInput();
                }
                $userObj = User::find(Auth::id());
                if (! Hash::check($request->get('old_password'), $userObj->password)) {
                    $response['message'] = 'Current password is wrong';

                    return redirect()->route('settings')->with('error', $response['message']);
                }
                $userObj->password = Hash::make($requestData['password']);
                if ($userObj->save()) {
                    return redirect()->route('settings')->with('success', 'Password changed successfully');
                } else {
                    return redirect()->route('settings')->with('error', 'Wrong old password');
                }
            }

            if ($requestData['request_type'] == 'personal_info') {

                $rules['first_name'] = 'required|min:3';
                $rules['last_name'] = 'required|min:3';
                $rules['email'] = 'required|email|email:rfc,dns|unique:users,email,'.Auth::id();
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->route('settings')->withErrors($validator)->withInput();
                }
                $userObj = User::where('id', Auth::id())->first();
                $userObj->first_name = $requestData['first_name'] ?? '';
                $userObj->last_name = $requestData['last_name'] ?? '';
                $userObj->name = (($requestData['first_name'] ?? '').' '.($requestData['last_name'] ?? ''));
                $userObj->email = $requestData['email'] ?? '';
                if ($userObj->save()) {
                    return redirect()->route('settings')->with('message', 'Personal info changed successfully');
                } else {
                    return redirect()->route('settings')->with('error', 'Something went wrong');
                }
            }

            if ($requestData['request_type'] == 'smtp') {
                $rules['smtp_email'] = 'required|email|email:rfc,dns';
                $rules['smtp_password'] = 'required|min:6';
                $rules['smtp_host'] = 'required';
                $rules['smtp_port'] = 'required';
                $rules['smtp_from_address'] = 'required|email|email:rfc,dns';
                $rules['smtp_from_name'] = 'required|min:3';

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->route('settings')->withErrors($validator)->withInput();
                }

                $smtp = [
                    'email' => $requestData['smtp_email'],
                    'password' => $requestData['smtp_password'],
                    'host' => $requestData['smtp_host'] ?? '',
                    'port' => $requestData['smtp_port'] ?? '',
                    'from_address' => $requestData['smtp_from_address'],
                    'from_name' => $requestData['smtp_from_name'],
                ];

                $jsonData = json_encode($smtp);
                $settingObj = Setting::where('name', 'smtp')->first();

                if (! $settingObj) {
                    $settingObj = new Setting;
                    $settingObj->name = 'smtp';
                    $settingObj->description = 'SMTP setting is using to setup the mail configuration';
                }

                $settingObj->value = $jsonData;
                $settingObj->save();

                return redirect()->route('settings')->with('success', 'SMTP setting updated successfully');
            }

            if ($requestData['request_type'] == 'debug_mode') {
                $debug_mode = [
                    'debug_mode' => isset($requestData['debug_mode']) ? true : false,
                ];

                $jsonData = json_encode($debug_mode);

                $settingObj = Setting::where('name', 'debug_mode')->first();

                if (! $settingObj) {
                    $settingObj = new Setting;
                    $settingObj->name = 'debug_mode';
                    $settingObj->description = 'App debug mode on/off';
                }

                $settingObj->value = $jsonData;
                $settingObj->save();

                return redirect()->route('settings')->with('success', 'Debug mode updated successfully');
            }

            if ($requestData['request_type'] == 'push_notification_server_key') {
                $rules['push_notification_server_key'] = 'required';

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->route('settings')->withErrors($validator)->withInput();
                }
                $push_notification_server_key = [
                    'push_notification_server_key' => $requestData['push_notification_server_key'] ?? null,
                ];

                $jsonData = json_encode($push_notification_server_key);

                $settingObj = Setting::where('name', 'push_notification_server_key')->first();

                if (! $settingObj) {
                    $settingObj = new Setting;
                    $settingObj->name = 'push_notification_server_key';
                    $settingObj->description = 'Push notification server key';
                }

                $settingObj->value = $jsonData;
                $settingObj->save();

                return redirect()->route('settings')->with('success', 'Push notification server key updated successfully');
            }

            if ($requestData['request_type'] == 'paypal_configuration') {
                $rules['paypal_mode'] = 'required';
                $rules['client_id'] = 'required|min:10';
                $rules['client_secret'] = 'required|min:10';
                $rules['app_id'] = 'required|min:8';
                $rules['currency'] = 'required|min:3';

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->route('settings')->withErrors($validator)->withInput();
                }

                $paypalDetails = [
                    'paypal_mode' => $requestData['paypal_mode'] ?? '',
                    'client_id' => $requestData['client_id'] ?? '',
                    'client_secret' => $requestData['client_secret'] ?? '',
                    'app_id' => $requestData['app_id'] ?? '',
                    'currency' => $requestData['currency'] ?? '',
                ];

                $jsonData = json_encode($paypalDetails);

                $settingObj = Setting::where('name', 'paypal_configuration')->first();

                if (! $settingObj) {
                    $settingObj = new Setting;
                    $settingObj->name = 'paypal_configuration';
                    $settingObj->description = 'Paypal details Like client id, secret key, app id and etc.';
                }

                $settingObj->value = $jsonData;
                $settingObj->save();

                return redirect()->route('settings')->with('success', 'Paypal configuration updated successfully');
            }

            // Fallback for invalid request_type
            return redirect()->route('settings')->with('error', 'Invalid Request');
        } catch (\Exception $e) {
            return redirect()->route('settings')->with('error', $e->getMessage());
        }
    }
}
