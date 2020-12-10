<?php

namespace App\Helpers;
use App\{Cities,Provider,Employee,Products,Lists,Items};

class ListsHelper {

    public static function load($request, $employee_id=null){
        $handlers = ['employee','provider'];
        $lists = [];
        if(in_array($request->handler,$handlers)){
            $scope = $request->handler.'s';
            $lists = Lists::$scope()->with("items")->OrderByID()->where('employee_id', '!=' , $employee_id)->byStatus($request->type)->paginate(10);
        }
        return $lists;
    }

    
    public static function setStatus($request,$id){
        $recall_at = (!empty($request->recall_date) and !empty($request->recall_time))?  $request->recall_date . ' ' . $request->recall_time : NULL;
        $message =  \Status::list($id)->status($request->statue)->reason($request->cancel_reason)->recall_at($recall_at)->save_status() ? ["Success" => "changed successfuly"] : ["error" => "unexpected error occured "];
        unset($recall_at );
        return $message;
    }



    public function trashed($q){
        Lists::trashed()->paginate($q);
    }


    public static function list_relatives($handler){
        $list_array = [];
        $scope = $handler.'s';
        
        if(\System::auth_type() != 'provider'){
            $employees = Employee::orderby('id','desc')->get();
            $providers = Provider::orderby('id','desc')->get();
        }
        if($handler != 'admin'){
            $result =  \System::stats($handler,\System::auth_type());
            $lists = Lists::$scope()->with('employee','items','provider')->OrderByID()->paginate(10);
        }else{
            $lists = Lists::with('employee','items','provider')->OrderByID()->paginate(10);
        }
        
        $cities = Cities::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
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
    
    // the action of saving the products of the listing
    public static function multiSaleProductsSave($post,$list_id){
        for($x=0, $count=count($post['ProductID']); $x < $count; $x++){
             $pro             = new Items();
             $pro->list_id    = $list_id;
             $pro->product_id = $post['ProductID'][$x];
             $pro->price      = $post['prix'][$x];
             $pro->quantity   = $post['quantity'][$x];
             $pro->save();
         }
     }
 
     // save OR update the products of the order
     public static function saveMultiSale($post,$list_id,$update = false){
         if($update){
                 Items::where('list_id', $list_id)->delete();
                 self::multiSaleProductsSave($post,$list_id);
         }
         else self::multiSaleProductsSave($post,$list_id);
     }
     
    public static function update($request, $id){
        $post =  $request->All();
        $Lists = Lists::find($id);
        $list_id = self::saveList($Lists,$post);
        self::saveMultiSale($post,$list_id,true);
    }
}