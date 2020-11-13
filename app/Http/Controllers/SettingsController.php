<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function clients()
    {
        return view('client.settings');
    }

    public function updateClient(Request $request)
    {
        dd($request);
    }

    public function supper()
    {
        return view('supper.settings');
    }

    public function updateSupper(Request $request)
    {
        dd($request);
    }

    public function dashboard()
    {
        dd("Dashboard settings");
    }

    public function updateDashboard()
    {
        dd("dashboard settings update");
    }

    public function employee()
    {
        return view('staff.employee.settings');
    }

    public function provider()
    {
        return view('staff.provider.settings');
    }
}
