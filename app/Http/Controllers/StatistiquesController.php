<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Http\Controllers\Controller;
use App\Lists;
use App\Products;
use App\User;
use Illuminate\Http\Request;

class StatistiquesController extends Controller
{

    public function index(){
        $canceled = Lists::where('status', 'canceled')->count() ?? 0;
        $unanswered = Lists::where('status', 'unanswered')->count() ?? 0;
        $recall = Lists::where('status', 'recall')->count() ?? 0;
        $delivred = Lists::where('status', 'delivred')->count() ?? 0;
        $employee = User::where('role', 'employee')->count() ?? 0;
        $provider = User::where('role', 'provider')->count() ?? 0;
        $cities = Cities::count() ?? 0;
        $products = Products::count() ?? 0;
        return view('dashboard.statistiques.index', compact('canceled',
                                                            'unanswered',
                                                            'recall',
                                                            'delivred',
                                                            'employee',
                                                            'provider',
                                                            'cities',
                                                            'products'));
    }
    public function cash(){
        return view('dashboard.statistiques.cash');
    }
}
