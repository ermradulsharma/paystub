<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\verifiedEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
          
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function callbackFromGoogle()
    {
        try {
        
            $user = Socialite::driver('google')->user();
         
            $finduser = User::where('google_id', $user->id)->first();
         
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->intended('userDashboard');
         
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);
         
                Auth::login($newUser);
        
                return redirect()->intended('userDashboard');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

  /*   public function login(Request $request){
        Log::info($request);
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            return view('home');
        }
        else{
            return Redirect::back ();
        }
    } */

    public function loginWithOtp(Request $request){
        Log::info($request);
        $user  = User::where(['email' => request('email'),'otp' => request('otp')])->first();
        if(!$user){
            $response['message'] = "Entered wrong verification code.";
            return response()->json($response, 201);
        }
        $user->code = null;
        $user->email_verified_at = Carbon::now();
        $user->save();
        Auth::login($user);
        $response['message'] = "Login successfully";
        return response()->json($response, 200);
    }
    
    public function sendOtp(Request $request){
    
        $code = '1234' ?? rand(1000,9999);
        $user  = User::where('email',request('email'))->first();
        if(!$user){
            $user = new User;
            $user->email = $request->email;
        }
        
        $user->code = $code;
        $user->save();
        $response['message'] = "Verification code sent successfully";
        return response()->json($response, 200);
    }
}