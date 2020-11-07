<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function index()
    {
        return view('index');
    }
     public function privacy()
    {
        return view('privacy');
    }
    public function terms()
    {
        return view('terms');
    }
}
