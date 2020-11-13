<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
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

}
