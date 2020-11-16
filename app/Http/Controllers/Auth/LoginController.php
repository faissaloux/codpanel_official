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
        $this->middleware('guest:admins')->except('logout');
        $this->middleware('guest:clients')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login');
    }

    public function showClientLoginForm()
    {
        return view('client.auth.login');
    }

    public function loginAdmin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:1'
        ]);

        if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect('/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'))->with('error',trans('user.wrong.auth'));
    }

    public function loginClient(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required | min:1',
        ]);

        if (Auth::guard('clients')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('client.panels');
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
