<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:clients')->except('logout');
    }

    public function settings()
    {
        return view('client.settings');
    }

    /**
     * UPDATE USER SETTINGS
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        if ( !Auth::guard('clients')->user()->is_verified )
            return redirect()->route('client.settings')->with('error', 'You should verify the email before change the information');
        $passwordChange = false;
        if( NULL !== $request->get('password') && !Hash::check($request->get('password'), Auth::guard('clients')->user()->getAuthPassword()) ) {
            $rules = [
                'email' => 'email | string | max:255 | unique:users',
                'fullName'  => 'string | max:255',
                'password' => 'string | max:255',
            ];
            $passwordChange = !$passwordChange;
        }
        else {
            $rules = [
                'email' => 'email | string | max:255 | unique:users',
                'fullName'  => 'string | max:255'
            ];
        }

        $messages = [
            'email.email' => trans('email.email'),
            'email.unique' => trans('email.unique'),
            'name.string' => trans('name.string')
        ];

        $credentials = $request->validate($rules, $messages);
        $user = Auth::guard('clients')->user();
        $user->name = $user->full_name = $credentials['fullName'];
        $user->email = $credentials['email'];
        if ( $passwordChange ) {
            $user->password = Hash::make($credentials['password']);
        }

        $user->save();

        return redirect()->route('client.settings')->with('message', 'Your infos was updated with success !');
    }

    public function orderdetail()
    {
        return view('client.orderPaid');
    }

    public function ordernow()
    {
        return view('client.ordernow');
    }

    public function orderStore(Request $request){
        dd($request->all());
    }

    public function orders()
    {
        return view('client.orders');
    }

    public function order()
    {
        return view('client.orderUnpaid');
    }

    public function staff()
    {
        return view('client.staff');
    }

    public function panels()
    {
        return view('client.panels');
    }

    public function support()
    {
        return view('client.support');
    }

    public function createTicket(Request $request){
        dd($request);
    }

    public function ticketdetail()
    {
        return view('client.ticketdetail');
    }
}
