<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;

class ProfileController extends Controller
{
    public function admin(){
        $user = Admin::find(\System::admin()->id);
        $user->role = "المدير";
        return view('dashboard.users.profile', compact('user'));
    }

    public function employee(){
        $employee = Employee::find(\System::employee()->id);
        $employee->role = "عميل الاتصال";
        return view('employee.profile', compact('employee'));
    }

    public function provider(){
        $provider = Provider::find(\System::provider()->id);
        $provider->role = "عميل التوصيل";
        return view('provider.profile', compact('provider'));
    }
}