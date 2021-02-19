<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Cities;
use App\Retour;
use App\Products;
use App\StockEntree;
use App\StockRetour;
use App\StockSortie;
use App\StockGeneral;
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

    private function validateSortieItem($productID, $CityID, $quantity){
    
        $stock = Stock::where('CityID', $CityID)->where('ProduitID', $productID)->first();
        
        if(!$stock){
            $data = [
                'CityID'=> $CityID,
                'ProduitID'=> $productID,
                'Recue'=>$quantity,
                'StockPhisique'=>$quantity,
            ];
            Stock::Create($data);
        }
        
        if($stock){
           $stock->Recue            =  $stock->Recue + $quantity;
           $stock->StockPhisique    =  $stock->StockPhisique + $quantity;
           $stock->save();  
        }
        
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
                'productID'         => $request->product,
                'cityID'            => $request->cities[$x],
                'quantity'          => $request->quantity[$x],
                'sortie_list_id'    => $sortie->id,
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
        return redirect()->route('dashboard.stock.create.sortie');
    }

    public function create_sortie()
    {
        $sortie         = StockSortie::whereNull('statue')->get();
        $HistorySortie  = StockSortieList::groupBy('productID')
                                        ->select(   \DB::raw('sum(quantity) as sum_quantity'),
                                                    \DB::raw('sum(valid) as sum_valid'),
                                                    'productID'
                                                )->get();
        $nots = $this->getStockGeneralNotification();
        return view('dashboard.stock.sortie',compact('sortie','HistorySortie','nots'));
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
        return response()->view('dashboard.elements.export_stock', compact('products', 'cities'))
                         ->setStatusCode(200);
    }

    public function rest(Request $request)
    {
        $id             = $request->id;

        $HistoryEntree  = HistoryEntree::where('productID', $id)
                                        ->select(\DB::raw('sum(valid) as sum_valid'))
                                        ->get()->toArray();

        $entree         = $HistoryEntree[0]['sum_valid'];

        $validSortie    = StockSortieList::where('productID', $id)
                                        ->select(\DB::raw('sum(valid) as sum_valid'))
                                        ->get()->toArray();

        $sortie         = $validSortie[0]['sum_valid'];
        $rest           = $entree - $sortie;

        return $rest;
    }

    public function loadSortieList(Request $request)
    {
        $id         = $request->id;
        $list       = StockSortieList::where('sortie_list_id', $id)->get();
        $cities     = Cities::orderby('id','desc')->get();

        return view('dashboard.elements.sortie_list',compact('list', 'cities'));
    }

    public function validateSortieList(Request $request)
    {
        $sortieRow = StockSortie::find($request->SortieListID);
        // delete Old Sortie Stock list
        StockSortieList::where('sortie_list_id', $request->SortieListID)->delete();
        
        // Create new Sortie List 
        for($x=0, $citiesCount=count( $request->cities ); $x < $citiesCount; $x++){          
            $data  = [
                      'productID'       => $sortieRow->productID ,
                      'sortie_list_id'  => $request->SortieListID,
                      'quantity'        => $request->quantities[$x],
                      'valid'           => $request->valid[$x],
                      'cityID'          => $request->cities[$x],
                      'statue'          => 1,
            ];
            StockSortieList::create($data);
        }
         
       // set the sortie list to valid
       $edit = StockSortie::find($request->SortieListID);
       $edit->statue = 1;
       $edit->save();
         
        // add the stock sortie to stockgeneral
        
        // add the stock to delivers stock
        for($x=0, $citiesCount=count( $request->cities ); $x < $citiesCount; $x++){
            $this->validateSortieItem($request->ProductID, $request->cities[$x], $request->valid[$x]);
        } 
         
        return redirect()->route('dashboard.stock.create.sortie');
    }

    public function listRetour()
    {
        $nots   = $this->getStockGeneralNotification();
        $retour = Retour::with('product', 'city', 'city.user')->get();
        
        return view('dashboard.stock.retour',compact('retour', 'nots'));
    }

    public function create_entree()
    {
        $stocks     = StockEntree::all();

        $HistoryEntree = HistoryEntree::groupBy( 'productID' )
                                    ->select(   \DB::raw('sum(quantity) as sum_quantity'),
                                                \DB::raw('sum(valid) as sum_valid'),
                                                'productID')
                                    ->get();
        $nots = $this->getStockGeneralNotification();
        
        return view('dashboard.stock.entree', compact('stocks','HistoryEntree','nots'));
    }

    public function validateEntree(Request $request)
    {
        // get the stock entree
        $entree         = StockEntree::find($request->id);
            
        // add the stock entree to history
        $new            = new HistoryEntree();
        $new->productID = $entree->productID;
        $new->quantity  = $entree->quantity;
        $new->note      = $entree->note;
        $new->valid     = $request->valid;
        $new->save();

        // search and check if the stock general has already this product
        $stock = StockGeneral::where('ProductID', $entree->productID)->first();
  
        if($stock) {
            // if the stock general has already this product this add the new quantity to the existing quantity
            if(!empty($stock->Entree) && is_numeric($stock->Entree)){
                $stock->Entree = $stock->Entree + $request->valid;
            }else {
                $stock->Entree = $request->valid;
            }
          
            $stock->save();
            
         }else {
                // if it dosnt exist add it
               StockGeneral::create(['Entree' => $request->valid , 'ProductID' => $entree->productID]); 
          }
         
        return $entree->delete();
    }

    public function loadEntreeHistory(Request $request)
    {
        $data = HistoryEntree::where('productID', $request->productID)->get();
        return view('dashboard.elements.history_entree', compact('data'));
    }

    public function loadHistorySortie(Request $request)
    {
        $list = StockSortieList::with('city', 'product')->where('productID', $request->productID)->get();
        return view('dashboard.elements.history_sortie', compact('list'));
    }

}