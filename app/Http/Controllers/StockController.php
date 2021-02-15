<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Products;
use App\StockEntree;
use App\StockRetour;
use App\StockSortie;
use App\HistoryEntree;
use App\StockSortieList;
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

    public function store_entree(Request $request)
    {
        $stock              = new StockEntree;
        $stock->productID   = $request->product;
        $stock->quantity    = $request->quantity;
        $stock->note        = $request->note;
        $stock->save();
        return redirect()->back();
    }

    public function saveRetour(Request $request)
    { 
        for($x=0, $quantityCount=count($request->quantity); $x < $quantityCount; $x++){
                        
            $data  = [
                'productID' => $request->product,
                'cityID'    => $request->cities[$x],
                'quantity'  => $request->quantity[$x],
            ];
            StockRetour::create($data);
        }
        
        $entree = [
            'productID' => $request->product,
            'quantity'  => array_sum($request->quantity),
            'valid'     => array_sum($request->quantity),
            'note'      => 'had stock dyal retour',
        ];

        HistoryEntree::create($entree);

        unset($stock);
        unset($entree);
        
        return redirect()->back();
    }

    public function store_sortie(Request $request)
    {
        $sortie = StockSortie::create([ 'productID' => $request->product ]);
        for($x=0, $quantityCount=count($request->quantity); $x < $quantityCount; $x++){
            $data  = [
                'sortie_list_id'    => $sortie->id,
                'quantity'          => $request->quantity[$x],
                'cityID'            => $request->cities[$x],
            ];
            StockSortieList::create($data);
            $Stock = Stock::where('CityID',$request->cities[$x])->where('ProduitID',$request->product)->first();
            if($Stock){
                $Stock->stockVirtuel = $request->quantity[$x];
                $Stock->save(); 
            }else {
                Stock::create([
                    'CityID'         => $request->cities[$x], 
                    'ProduitID'      => $request->product,
                    'stockVirtuel'   => $request->quantity[$x] ,
                ]);
            }
        }
        return redirect()->back();
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