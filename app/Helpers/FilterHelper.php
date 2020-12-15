<?php

namespace App\Helpers;

use App\Lists;


class FilterHelper{

    public static $query ;

    public static function setupDate($date){
        return \Carbon\Carbon::createFromFormat('M d, Y', trim($date))->toDateString();
    }


    public static function setupDateBetween($date){
        return \Carbon\Carbon::createFromFormat('M d, Y', trim($date))->addDays(1)->toDateString();
    }

    public static function filter($request){//dd($request);
        
        if ($request->data_apage == "trashed") {
            self::$query = Lists::with('employee','items','provider')->whereNotNull('deleted_at');
        }else{
            self::$query = Lists::with('employee','items','provider');
        }
   
        if (!empty($request->filter_city)) {
            self::$query = self::$query->where('city_id', $request->filter_city);
        }

        if (!empty($request->filter_provider)) {
            self::$query = self::$query->where('provider_id', $request->filter_provider);
        }

        if (!empty($request->filter_employee)) {
            self::$query = self::$query->where('employee_id', $request->filter_employee);
        }

        if (!empty($request->filter_product)) {
            $product_id = $request->filter_product;
            self::$query = self::$query->whereHas('items',function($query) use($product_id){
                $query->where('product_id',$product_id);
            });
        }

        if (!empty($request->filter_date)) {
            $date = explode("-",trim($request->filter_date));
            if(trim($date[0]) == trim($date[1])){
                self::$query = self::$query->whereDate('created_at', self::setupDate($date[0]));
            }else{
                self::$query = self::$query->whereBetween('created_at', [self::setupDateBetween($date[0]), self::setupDateBetween($date[1])]);
            }
            unset($date);
        }

        if (!empty($request->filter_q)) {
            self::$query = self::$query->where('name', $request->filter_q)->orWhere('phone', $request->filter_q)->orWhere('adress', $request->filter_q);
        }

        if (!empty($request->filter_by)) {
            $myfilter = explode(' ',trim($request->filter_by));
            self::$query = self::$query->orderBy($myfilter[0], $myfilter[1]);
        }

        if (!empty($request->data_type)) {
            $scope = \System::auth_type().'s';
            if(!\System::is_admin()){
                self::$query = self::$query->$scope()->byStatus($request->data_type)->where('handler',\System::auth_type());
            }else{
                self::$query = self::$query->byStatus($request->data_type);
            }            
        }

        if (!empty($request->data_limit)) {
            self::$query = self::$query->paginate($request->data_limit);
        }



        $lists = self::$query;

        return $lists;
    }

}