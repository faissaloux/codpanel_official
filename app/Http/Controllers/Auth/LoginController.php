<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function attempt(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:1'
        ]);

        //dd(Auth::guard('admins'));
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'))->with('error',trans('user.wrong.auth'));
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush(); // this method should be called after we ensure that there is no logged in guards left
        $request->session()->regenerate(); //same 
        return redirect('/login');
    }

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
}
