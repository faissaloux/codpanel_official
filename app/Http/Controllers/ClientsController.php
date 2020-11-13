<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;


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

    public function orderdetail()
    {
        return view('client.orderPaid');
    }

    public function ordernow()
    {
        return view('client.ordernow');
    }

    public function orderStore(Request $request){
        dd($request);
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

    public function dashboard()
    {
        return view('client.ordernow');
    }
}
