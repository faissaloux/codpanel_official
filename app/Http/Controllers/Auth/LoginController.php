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
        $this->middleware('guest:providers')->except('logout');
        $this->middleware('guest:employees')->except('logout');
    }

    // Admin

    public function adminlogin()
    {
        return view('auth.admin_login');
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
        //$request->session()->flush(); // this method should be called after we ensure that there is no logged in guards left
        //$request->session()->regenerate(); //same
        return redirect('/admin/login');
    }

    //End Admin

    // Provider

    public function providerlogin()
    {        
        return view('auth.providre_login');
    }

    public function providerattempt(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:1'
        ]);

        if (Auth::guard('providers')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/provider');
        }

        return back()->withInput($request->only('email', 'remember'))->with('error',trans('user.wrong.auth'));
    }

    public function providerlogout(Request $request){
        $this->guard('providers')->logout();
        //$request->session()->flush(); // this method should be called after we ensure that there is no logged in guards left
        //$request->session()->regenerate(); //same
        return redirect('/provider/login');
    }

    //End Provider

    // Employees

    public function employeelogin()
    {
        return view('auth.employee_login');
    }

    public function employeeattempt(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:1'
        ]);

        if (Auth::guard('employees')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/employee');
        }

        return back()->withInput($request->only('email', 'remember'))->with('error',trans('user.wrong.auth'));
    }

    public function employeelogout(Request $request){
        $this->guard('employees')->logout();
        //$request->session()->flush(); // this method should be called after we ensure that there is no logged in guards left
        //$request->session()->regenerate(); //same
        return redirect('/employees/login');
    }

    //End Employees






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
            return redirect()->route('client.panels');
        }

        //return redirect()->route('client.login')->withInput($request->only('email', 'remember'))->with('error', trans('user.wrong.auth'));
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
        //return redirect()->route('client.login');
    }
}
