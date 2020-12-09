<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;

class ProfileController extends Controller
{
    public function admin($id){
        $user = Admin::find($id);
        $role = "المدير";
        return view('dashboard.users.profile', compact($user));
    }

    public function employee($id){
        $user = Employee::find($id);
        $role = "عميل الاتصال";
        return view('dashboard.users.profile', compact($user));
    }

    public function provider($id){
        $user = Provider::find($id);
        $role = "عميل التوصيل";
        return view('dashboard.users.profile', compact($user));
    }
}