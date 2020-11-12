<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Employee;
use App\Provider;
use App\Http\Controllers\Controller;
use App\Lists;
use App\Products;

class StatistiquesController extends Controller
{

    public function index()
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

    public function revenue(){
        return view('dashboard.statistiques.revenue');
    }
}
