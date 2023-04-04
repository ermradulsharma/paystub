<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        return view('user-profile', compact('userObj'));
    }

    public function updatePassword(Request $request)
    {
        return "123456789";
        $requestData = $request->all();
        $rules['old_password'] = 'required|min:8';
        $rules['password'] = 'required|min:8|confirmed';
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $userObj = User::find(Auth::user()->id);
        if (!Hash::check($request->get('old_password'), $userObj->password)) {
            $response['message'] = 'Current password is worng';
            return back()->with('error',  $response['message']);
        }
        $userObj->password = Hash::make($requestData['password']);
        if ($userObj->save()) {
            return back()->with('success', 'Password changed successfully');
        } else {
            return back()->with('error', 'Wrong old password');
        }
    }
}
