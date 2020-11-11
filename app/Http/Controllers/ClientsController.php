<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function orderdetail()
    {
        return view('client.orderdetail');
    }

    public function ordernow()
    {
        return view('client.ordernow');
    }

    public function orders()
    {
        return view('client.orders');
    }

    public function settings()
    {
        return view('client.settings');
    }

    public function staff()
    {
        return view('client.staff');
    }

    public function stores()
    {
        return view('client.stores');
    }
    public function support()
    {
        return view('client.support');
    }

    public function ticketdetail()
    {
        return view('client.ticketdetail');
    }

}
