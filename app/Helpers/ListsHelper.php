<?php

namespace App\Helpers;
use App\Helpers\FilterHelper;
use App\{Cities,Provider,Employee,Products,Lists,Items};

class ListsHelper {

    public static function load($request){
        $handlers = ['employee','provider'];
        $lists = [];
        if(in_array($request->handler,$handlers)){
            $scope = $request->handler.'s';
            $lists = Lists::$scope()->with("items","employee","provider")->OrderByID()->byStatus($request->type)->get();
        }
        return $lists;
    }
    
    public static function setStatus($request,$id){
        $recall_at = (!empty($request->recall_date) and !empty($request->recall_time))?  $request->recall_date . ' ' . $request->recall_time : NULL;
     
        $message =  \Status::list($id)->status($request->statue)->reason($request->cancel_reason)->recall_at($recall_at)->save_status() ? ["Success" => "changed successfuly"] : ["error" => "unexpected error occured "];
        unset($recall_at );
        return $message;
    }

    public static function list_relatives($handler,$request = null){
        $list_array = [];
        $scope = $handler.'s';
        
        $has = $request->filter ?? null ? $request->filter : false;        
        
        if(\System::auth_type() != 'provider' && $has == false){
            $employees = Loader::employees();
            $providers = Loader::providers();
        }
        if($handler != 'admin' && $handler != 'trashed' && $has == false){
            $result =  \System::stats($handler,\System::auth_type());
            $lists = Lists::$scope()->with('employee','items','provider')->OrderByID()->paginate(15);
        }elseif($handler == 'trashed' && $has == false){
            $lists = Lists::onlyTrashed()->with('employee','items','provider')->OrderByID()->paginate(15);
        }elseif($has == 'filter'){
            $lists = FilterHelper::filter($request);
        }
        else{
            $lists = Lists::with('employee','items','provider')->OrderByID()->paginate(15);
        }
        
        $cities = Loader::cities();
        $products = Loader::products();
        array_push($list_array,['result' => $result ?? null,'cities' => $cities,'providers' => $providers ?? null,'employees' => $employees ?? null,'products' => $products , 'lists' => $lists ]);
        return $list_array;
    }

    // creating the list OR update
    public static function saveList($model,$post, $checkNumber = false){
        $model->name            = $post['name'];
        $model->adress          = $post['adress'];
        $model->phone           = $post['tel'];
        $model->city_id         = $post['cityID'];
        $model->provider_id     = Cities::find($post['cityID'])->provider_id ?? NULL;
        $model->laivraison      = $post['prix_de_laivraison'] ;
        $model->employee_id     = $post['employee'] ?? $model->employee_id  ;

        $model->save();
        return $model->id;
    }
    

    // create_items($list,$post)
    // the action of saving the products of the listing
    public static function multiSaleProductsSave($post,$list_id){

        $count  = count($post['ProductID']);
        for($x=0 ; $x < $count ; $x++){

            /*
             $pro             = new Items();
             $pro->list_id    = $list_id;
             $pro->product_id = $post['ProductID'][$x];
             $pro->price      = $post['prix'][$x];
             $pro->quantity   = $post['quantity'][$x];
             $pro->save();
            */
           
             $list->items->create([  
                'productID'  => $post['ProductID'][$x],
                'price'      => $post['prix'][$x],
                'quantity'   => $post['quantity'][$x],
             ]);
         }
         unset($post,$count);
    }
 
     // save OR update the products of the order
    public static function saveMultiSale($post,$list_id,$update = false){
        if($update){
                Items::where('list_id', $list_id)->delete();
                self::multiSaleProductsSave($post,$list_id);
        }
        else self::multiSaleProductsSave($post,$list_id);
    }

    public static function store($request){
        $post =  $request->All();
        $Lists = new Lists();
        $list_id = self::saveList($Lists,$post,true);
        self::saveMultiSale($post,$list_id);
     }
     
    public static function update($request, $id){
        $post =  $request->All();
        $Lists = Lists::find($id);
        $list_id = self::saveList($Lists,$post);
        self::saveMultiSale($post,$list_id,true);
    }
}