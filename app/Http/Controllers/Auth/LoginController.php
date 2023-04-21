<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){

        if (Auth::user()->role_as == 'admin')

            return 'admin/dashboard';

        elseif (Auth::user()->role_as == 'vendor'){
            return 'vendor/dashboard';
        }
        else{
            return '/';
        }

    }

//    public function authenticated(){
//        if (Auth::user()->role_as == 'admin')
//
//            return redirect()->route('admin/dashboard')->with('status', 'welcome to admin dashboard');
//
//        elseif (Auth::user()->role_as == 'vendor'){
//            return redirect()->route('vendor/dashboard')->with('status', 'welcome to admin dashboard');
//        }
//
//        elseif (Auth::user()->role_as == null){
//            return redirect()->back();
//        }
//
//    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();

    }

    //google call-back
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('admin.dashboard');
    }

    //faceboobk login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //facebook call-back
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('admin.dashboard');
    }

    protected function _registerOrLoginUser($data){

        $user = User::where('email', '=', $data->email)->first();

        if (!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->provider_id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password') , ['status' => 'Active']);
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }


}
