<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public $listingView = 'dashboard.elements.stock_table';

    public function index(Request $request)
    {
        $totalProducts  = Products::with(['items' => function($q){
                                                                $q->with(['lists' => function($qq){
                                                                    $qq->withCount('paid_payments');
                                                                }]);
                                                            }])->orderby('id','desc')->get();
        $products       = Products::with(['items' => function($q){
                                                                $q->with(['lists' => function($qq){
                                                                    $qq->withCount('paid_payments');
                                                                }]);
                                                            }])->orderby('id','desc')->paginate(5);
        $total_enter    = 0;
        $total_paid     = 0;
        foreach($totalProducts as $product){
            foreach($product->items as $item){
                if(!isset($item->lists)){
                    $item['lists'] = new \stdClass();
                    $item->lists->paid_payments_count = 0;
                    $product->enter += 0;
                    $product->paid  += $item->lists->paid_payments_count;
                }else{
                    $product->enter += $item->quantity;
                    $product->paid  += $item->lists->paid_payments_count * $item->quantity;
                }
            }
            $total_enter    += $product->enter;
            $total_paid     += $product->paid;
        }

        foreach($products as $product){
            foreach($product->items as $item){
                if(!isset($item->lists)){
                    $item['lists'] = new \stdClass();
                    $item->lists->paid_payments_count = 0;
                    $product->enter += 0;
                    $product->paid  += $item->lists->paid_payments_count;
                }else{
                    $product->enter += $item->quantity;
                    $product->paid  += $item->lists->paid_payments_count * $item->quantity;
                }
            }
        }
        
        if($request->ajax()){
            return response()->view($this->listingView , compact('products'))->setStatusCode(200);
        }
        return view('dashboard.stock.index',compact('products', 'total_enter', 'total_paid'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store()
    {
        return view('admin.users.create');
    }

    public function edit()
    {
        return view('admin.users.create');
    }

    public function update()
    {
        return view('admin.users.create');
    }

    public function delete()
    {
        return view('admin.users.create');
    }
}