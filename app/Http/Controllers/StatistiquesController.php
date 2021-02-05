<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Cities;
use App\Payment;
use App\Employee;
use App\Products;
use App\Provider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatistiquesController extends Controller
{

    public function index(Request $request)
    {
        $canceled               = Lists::canceled()->count() ?? 0;
        $unanswered             = Lists::unanswered()->count() ?? 0;
        $recall                 = Lists::recall()->count() ?? 0;
        $delivred               = Lists::delivred()->count() ?? 0;
        $employees              = Employee::with('lists', 'delivredLists')->get(['id', 'name']);
        $providers              = Provider::with('lists', 'delivredLists')->get(['id', 'name']);
        $cities                 = Cities::with(['provider' => function($q){
                                                                            $q->with('lists', 'delivredLists');
                                                                        }])->get();
        $cities_diff            = Cities::currentMonth() - Cities::lastMonth();

        $products               = Products::with(['items' => function($q){
                                                                            $q->with('delivredList');
                                                                        }])->get();
        $products_diff          = Products::currentMonth() - Products::lastMonth();

        $total_benefits         = explode(".", number_format(Payment::where('paid', 1)->sum('amount'), 2));
        $total_benefits_diff    = Payment::currentMonth()->amount ?? 0 - Payment::lastMonth()->amount ?? 0;
        $stats                  = Payment::stats();

        foreach($products as $product){
            foreach($product->items as $item){
                if($item->delivredList != null) $product->delivred++;
            };
        }
        return view('dashboard.statistiques.index', compact('canceled',
                                                            'unanswered',
                                                            'recall',
                                                            'delivred',
                                                            'employees',
                                                            'providers',
                                                            'cities',
                                                            'cities_diff',
                                                            'products',
                                                            'products_diff',
                                                            'total_benefits',
                                                            'total_benefits_diff',
                                                            'stats'));
    }
}