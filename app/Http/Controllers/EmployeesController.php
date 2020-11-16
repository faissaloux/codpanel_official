<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Cities;
use App\Employee;
use App\Products;
use App\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
 
    public function index()
    {
        $auth = Auth::guard('employees')->user();

        $lists = Lists::orderby('id','desc')->with('provider','items')->where('handler','employee')->paginate(10);
        $cities = Cities::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $employees = Employee::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
        return view('employee.index', compact('lists','cities','providers','employees','products','auth','logout'));
    }

}
