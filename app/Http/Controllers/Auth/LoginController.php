<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   public function login(){

    $credentials = $this->validate(request(), [
        'email'=>'email|required',
        'password'=>'required'
    ]);

    if(Auth::attempt($credentials)){
        if(Auth::user()->active == '1'){
            return redirect(RouteServiceProvider::HOME);
        }
            
    }
    Auth::guard()->logout();
    //Auth::logout();
            return back()->withErrors(['error'=>'!Cuenta desactivada! Contacte con el administrador.']);
   }
    
}
