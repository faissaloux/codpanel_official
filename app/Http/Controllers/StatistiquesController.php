<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Employee;
use App\Provider;
use App\Http\Controllers\Controller;
use App\Items;
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
        $employees = Employee::with('lists', 'delivredLists')->get(['id', 'name']);
        $providers = Provider::with('lists', 'delivredLists')->get(['id', 'name']);
        $cities = Cities::with(['provider' => function($q){
                                                        $q->with('lists', 'delivredLists');
                                                    }])->get();
        $products = Products::with(['items' => function($q){
                                                        $q->with('delivredList');
                                                    }])->get();

        foreach($products as $product){
            foreach($product->items as $item){
                if($item->delivredList != null) $product->delivred++;
            };
        }
        return view('dashboard.statistiques.index', compact('canceled', 'unanswered', 'recall', 'delivred', 'employees', 'providers', 'cities', 'products'));
    }
}
