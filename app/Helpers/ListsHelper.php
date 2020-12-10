<?php

namespace App\Helpers;
use App\{Cities,Provider,Employee,Products,Lists};

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




}