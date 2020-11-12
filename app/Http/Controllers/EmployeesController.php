<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Lists;
use App\Products;
use App\Provider;

class EmployeesController extends Controller
{
 
    public function index()
    {
        $lists = Lists::orderby('id','desc')->with('provider','items')->paginate(10);
        $cities = Cities::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $employees = Employee::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
        return view('staff.employees.index', compact('lists','cities','providers','employees','products'));
    }

}
