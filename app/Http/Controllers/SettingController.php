<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Currency;
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
                $smtp = $smtpSetting->value ?? "[]";
                $smtp = json_decode($smtp, true);

                $appSetting = Setting::where('name', 'app')->first();
                $app = $appSetting->value ?? "[]";
                $app = json_decode($app, true);

                $notificationObj = Setting::where('name', 'push_notification_server_key')->first();
                $notification = $notificationObj->value ?? "[]";
                $notification = json_decode($notification, true);

                $currencies = Currency::pluck('name','name')->all();

                return view('admin.setting')->with(compact('data', 'settings', 'smtp', 'notification','currencies'));
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
                        $errorResponse = validation_error_response($validator->errors()->toArray());
                        return redirect()->back()->with('error', $errorResponse['message']);
                    }
                    $userObj = User::find(Auth::user()->id);
                    if (!Hash::check($request->get('old_password'), $userObj->password)) {
                        $response['message'] = WRONG_PASSWORD;
                        return redirect()->back()->with('error',  $response['message']);
                    }
                    $userObj->password = Hash::make($requestData['password']);
                    if ($userObj->save()) {
                        return redirect()->back()->with('success', 'Password changed successfully');
                    } else {
                        return redirect()->back()->with('error', 'Wrong old password');
                    }
                }

                if ($requestData['request_type'] == 'smtp') {
                    $smtp = [
                        'email' => $requestData['smtp_email'],
                        'password' => $requestData['smtp_password'],
                        'host' => $requestData['smtp_host'] ?? "",
                        'port' => $requestData['smtp_port'] ?? "",
                        'from_address' => $requestData['smtp_from_address'],
                        'from_name' => $requestData['smtp_from_name'],
                    ];

                    $jsonData = json_encode($smtp);
                    $settingObj = Setting::where('name', 'smtp')->first();

                    if (!$settingObj) {
                        $settingObj = new Setting;
                        $settingObj->name = 'smtp';
                        $settingObj->description = 'SMTP setting is using to setup the mail configuration';
                    }

                    $settingObj->value = $jsonData;
                    $settingObj->save();
                    return redirect()->back()->with('success', 'SMTP setting updated successfully');
                }

                if ($requestData['request_type'] == 'debug_mode') {
                    $debug_mode = [
                        'debug_mode' => isset($requestData['debug_mode']) ? true : false,
                    ];

                    $jsonData = json_encode($debug_mode);

                    $settingObj = Setting::where('name', 'debug_mode')->first();

                    if (!$settingObj) {
                        $settingObj = new Setting;
                        $settingObj->name = 'debug_mode';
                        $settingObj->description = 'App debug mode on/off';
                    }

                    $settingObj->value = $jsonData;
                    $settingObj->save();
                    return redirect()->back()->with('success', 'Debug mode updated successfully');
                }

                if ($requestData['request_type'] == 'push_notification_server_key') {
                    $push_notification_server_key = [
                        'push_notification_server_key' => $requestData['push_notification_server_key'] ?? NULL
                    ];

                    $jsonData = json_encode($push_notification_server_key);

                    $settingObj = Setting::where('name', 'push_notification_server_key')->first();

                    if (!$settingObj) {
                        $settingObj = new Setting;
                        $settingObj->name = 'push_notification_server_key';
                        $settingObj->description = 'Push notification server key';
                    }

                    $settingObj->value = $jsonData;
                    $settingObj->save();
                    return redirect()->back()->with('success', 'Push notification server key updated successfully');
                }

                if ($requestData['request_type'] == 'paypal_configuration') {

                    $paypalDetails = [
                        "paypal_mode" => $requestData['paypal_mode'] ?? '',
                        "client_id" => $requestData['client_id'] ?? '',
                        "client_secret" => $requestData['client_secret'] ?? '',
                        "app_id" => $requestData['app_id'] ?? '',
                        "currency" => $requestData['currency'] ?? '',
                    ];

                    $jsonData = json_encode($paypalDetails);
                     dd($jsonData);
                    $settingObj = Setting::where('name', 'paypal_configuration')->first();

                    if (!$settingObj) {
                        $settingObj = new Setting;
                        $settingObj->name = 'paypal_configuration';
                        $settingObj->description = 'Paypal details Like client id, secret key, app id and etc.';
                    }

                    $settingObj->value = $jsonData;
                    $settingObj->save();
                    return redirect()->back()->with('success', 'Paypal configuration updated successfully');
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

    }


}
