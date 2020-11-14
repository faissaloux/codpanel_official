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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:clients')->except('logout');
    }

    // Admin

    public function adminlogin()
    {
        return view('auth.login');
    }

    public function adminattempt(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:1'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'))->with('error',trans('user.wrong.auth'));
    }

    public function adminlogout(Request $request){
        $this->guard('admin')->logout();
        $request->session()->flush(); // this method should be called after we ensure that there is no logged in guards left
        $request->session()->regenerate(); //same
        return redirect('/admin/login');
    }






    public function showClientLoginForm()
    {
        return view('client.auth.login');
    }

    

    public function loginClient(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required | min:1',
        ]);

        if (Auth::guard('clients')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('client.dashboard');
        }

        return redirect()->route('client.login')->withInput($request->only('email', 'remember'))->with('error', trans('user.wrong.auth'));
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush(); // this method should be called after we ensure that there is no logged in guards left
        $request->session()->regenerate(); //same
        return redirect('/login');
    }

    public function logoutClient(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('client.login');
    }
}
