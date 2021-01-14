<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Provider;

class ProfileController extends Controller
{
    public function admin(){
        $admin = Admin::find(\System::admin()->id);
        $admin->role = "المدير";
        $admin->roleEn = "admin"; 
        return view('dashboard.users.profile', compact('admin'));
    }

    public function employee(){
        $employee = Employee::find(\System::employee()->id);
        $employee->role = "عميل الاتصال";
        $employee->roleEn = "employee"; 
        return view('employee.profile', compact('employee'));
    }

    public function provider(){
        $provider = Provider::find(\System::provider()->id);
        $provider->role = "عميل التوصيل";
        $provider->roleEn = "provider"; 
        return view('provider.profile', compact('provider'));
    }
}