<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class StockController extends Controller
{
    public function index(Request $request)
    {
        // $stock = Stock::orderby('id','desc')->paginate(10);
        return view('dashboard.stock.index',compact('stock'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store()
    {
        return view('admin.users.create');
    }

    public function edit()
    {
        return view('admin.users.create');
    }

    public function update()
    {
        return view('admin.users.create');
    }

    public function delete()
    {
        return view('admin.users.create');
    }
}