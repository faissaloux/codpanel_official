<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Cities;
use App\Employee;
use App\Products;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatistiquesController extends Controller
{

    public function index(Request $request)
    {
        $canceled = Lists::canceled()->count() ?? 0;
        $unanswered = Lists::unanswered()->count() ?? 0;
        $recall = Lists::recall()->count() ?? 0;
        $delivred = Lists::delivred()->count() ?? 0;
        $employees = Employee::count() ?? 0;
        $providers = Provider::count() ?? 0;
        $cities = Cities::count() ?? 0;
        $products = Products::count() ?? 0;

        return view('dashboard.statistiques.index', compact('canceled', 'unanswered', 'recall', 'delivred', 'employees', 'providers', 'cities', 'products'));
    }
}