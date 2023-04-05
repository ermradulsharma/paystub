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

    public function verificationCode(Request $request)
    {

        $userObj = User::find(Auth::user()->id);
        return view('mail.verify', compact('userObj'));
    }

    public function updatePassword(Request $request)
    {
        $requestData = $request->all();
        return response()->json([$requestData]);
    }
}
