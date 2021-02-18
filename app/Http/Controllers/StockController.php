<?php

namespace App\Http\Controllers;

use App\Cities;
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

    private function getStockGeneralNotification(){
        return [
            'entree'  => StockEntree::count(),
            'sortie'  => StockSortie::whereNULL('statue')->count()
        ];
    }

    public function index(Request $request)
    {
        $nots = $this->getStockGeneralNotification();
            
        $products = [];

        $HistoryEntree = HistoryEntree::groupBy( 'productID' )
        ->select(   \DB::raw('sum(quantity) as sum_quantity'),
                    \DB::raw('sum(valid) as sum_valid'),
                    'productID')
        ->get();
        
        foreach($HistoryEntree as $item ){
            if($item->product){
                $validSortie = StockSortieList::where('productID',$item->product->id)
                                                ->selectRaw('sum(quantity) as sum_quantity, sum(valid) as sum_valid')
                                                ->get()->toArray();
                
                array_push($products, [
                    'product_id'   => $item->product->id,
                    'product_name' => $item->product->name,
                    'total_sortie' => $validSortie[0]['sum_valid'],
                    'total_entree' => $item->sum_valid ,
                    'rest'         => $item->sum_valid - $validSortie[0]['sum_valid'] ,
                ]);
            }
        }
        return view('dashboard.stock.index',compact('nots', 'products'));
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
        $products = Products::orderby('id','desc')->get();
        return response()->view('dashboard.elements.add_stock', compact('products'))
                         ->setStatusCode(200);
    }

    public function return()
    {
        $products   = Products::orderby('id','desc')->get();
        $cities     = Cities::orderby('id','desc')->get();
        return response()->view('dashboard.elements.return_stock', compact('products', 'cities'))
                         ->setStatusCode(200);
    }

    public function export()
    {
        $products   = Products::orderby('id','desc')->get();
        $cities     = Cities::orderby('id','desc')->get();
        return response()->view('dashboard.elements.return_stock', compact('products', 'cities'))
                         ->setStatusCode(200);
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