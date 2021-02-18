<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Cities;
use App\StockRetour;
use App\StockSortieList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceptionController extends Controller
{

    private function receptionData($city){ 

        $data = [];
        // get retour
        $this->city_id = $city;

        $retours = StockRetour::where('cityID',$city)->select('id','productID','cityID','quantity')->get()->toArray();
        $recues  = StockSortieList::where('cityID',$city)->get()->toArray();
        $livred  = Lists::with('products','products.product')->where('city_id',$city)->whereNotNull('delivred_at')->get()->toArray();
        $encours = Lists::with('products','products.product')

                        ->whereNull('deleted_at')
                        ->whereNotNull('confirmed_at')
                        ->whereNotNull('verified_at')
                        ->whereNull('duplicated_at')

                        ->whereNull('canceled_at')
                        ->whereNull('delivred_at')
                        ->whereNull('recall_at')
                        ->where('status','!=','unanswered')
                        ->where('city_id',$this->city_id)

                        // اظهار الطلبات التي لا تجيب بعد 15 دقيقة 
                        ->orwhere(function($query) {
                            $query
                            ->where('city_id',$this->city_id)
                            
                        ->whereNotNull('confirmed_at')
                        ->whereNotNull('verified_at')
                        ->whereNull('deleted_at')
                        ->whereNull('duplicated_at')
                        ->whereNotNull('unanswered_at')
                        ->whereNull('delivred_at')
                        ->whereNull('canceled_at')
                        ->whereNull('recall_at')
                        ->where('unanswered_at', '<', \Carbon\Carbon::now()->subMinutes(60)->toDateTimeString());
                        })
                        

                        // اظهار الطلبات بعد مرور وقت إعادة الإتصال
                        ->orwhere(function($query) {
                            $query
                             ->where('city_id',$this->city_id)
                             
                        ->whereNull('deleted_at')
                        ->whereNotNull('confirmed_at')
                        ->whereNotNull('verified_at')
                        ->whereNull('duplicated_at')
                        ->whereNull('canceled_at')
                        ->whereNull('delivred_at')
                        ->whereNull('unanswered_at')
                        ->whereNotNull('recall_at')
                        ->where('recall_at', '<', \Carbon\Carbon::now());
                        })->get()->toArray();;

        foreach ($_SESSION['products'] as $product) {


            $item = [
                'product_id'  =>  $product['id'],
                'product_name'=>  $product['name'],
                'product_ref' =>  $product['reference'],    
            ];

            // calculating the retour stock
            $product_retour = 0;
            foreach ($retours as $retour) {
                if($product['id'] == $retour['productID']){
                    $product_retour += $retour['quantity'];
                }
            }
            $item['retour'] = $product_retour;


            // calculating recue stock
            $product_recue = 0;
            foreach ($recues as $recue) {
                if($product['id'] == $recue['productID']){
                    $product_recue += $recue['valid'] ?? 0;
                }
            }
            $item['recue'] = $product_recue;

            // calculating real stock
            $item['real'] = $item['recue'] - $item['retour'];

            $item['livre']     = 0;
            $item['physique']  = 0;
            $item['theorique'] = 0;
            $item['encours']   = 0;
            
            $data[$product['id']] = $item;
        }

        unset($product_recue,$product_retour,$item,$product);


        foreach($livred as $item){
            foreach($item['products'] as $product){    
               $data[$product['productID']]['livre'] += $product['quanity'];
            }
        }

        unset($livred,$item,$product);

        foreach($encours as $item){
            foreach($item['products'] as $product){    
               $data[$product['productID']]['encours'] += $product['quanity'];
            }
        }

        $new = [];
        foreach ($data as $item) {
            $item['physique'] = $item['real'] - $item['livre'];
            $item['theorique'] = $item['physique'] - $item['encours'];
            $new[] = $item;
        }

        unset($livred,$data,$item,$product);

        return $new;

    }

    public function index(Request $request)
    {
        $city = $_GET['city'] ?? 31;
        
        $result = [];
        foreach ($_SESSION['cities'] as $citie) {
          if($citie['id'] == $city){
                $result[$citie['name']] = $this->receptionData($city);
           }
        }
        
        $reception = $result;
        $cities     = Cities::select('id', 'name')->orderby('id','desc')->get();
        return view('dashboard.stock.reception', compact('reception','cities'));  
    }
}
