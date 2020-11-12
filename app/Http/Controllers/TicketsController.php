<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index()
    {
        //
    }
    
    public function create(Request $request)
    {
        dd($request);
    }

    public function store()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }

    public function details()
    {
        return view('client.ticketdetail');
    }
}
