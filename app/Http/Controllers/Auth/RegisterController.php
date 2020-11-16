<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Client;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:admins');
        $this->middleware('guest:clients');
    }

    public function showClientRegisterView()
    {
        if ( Auth::guard('clients')->user() ) return redirect()->route('client.panels');
        return view('client.auth.sign-up');
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateClientRequest(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'min:4', 'max:255'],
            'lastName' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'email', ' string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'max:255', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    protected function createClient(Request $request)
    {
        $this->validateClientRequest($request->all())->validate();
        $client = Client::create([
            'name' => $request['firstName'] . ' ' . $request['lastName'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        Auth::guard('clients')->login($client);
        return redirect()->route('client.ordernow');
    }

    protected function createAdmin(array $data)
    {
        return Admin::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
        ]);
    }
}
