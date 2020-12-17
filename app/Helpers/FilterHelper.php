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

    public static function filter($request){
        
        $query = Lists::with('employee','items','provider');
        
        $conditions = [];

        $limit = $request->data_limit ?? 15 ;

        $cons = [
            //request inputy => database column
                'filter_city' => 'city_id',
                'filter_provider' => 'provider_id',
                'filter_employee' => 'employee_id'
        ];

        foreach ($cons as $key => $value ) {
            if(!empty($request->$key)){
                $conditions[] = [$value,'=',$request->$key];
            }
        }

        if (!empty($request->filter_product)) {
            $query->byProduct($request->filter_product);
        }


        if (!empty($request->filter_date)) {
            $date = explode("-",trim($request->filter_date));
            if(trim($date[0]) == trim($date[1])){
                $query->whereDate('created_at', self::setupDate($date[0]));
            }else{
                $query->whereBetween('created_at', [self::setupDateBetween($date[0]), self::setupDateBetween($date[1])]);
            }
            unset($date);
        }


        $q = '%'.$request->filter_q.'%';
        $query->when(!empty($request->filter_q) , function() use($q,$query){
            $query->where(function($query) use($q) {
                return $query->where('name', 'LIKE',$q)->orWhere('phone', 'LIKE',$q)->orWhere('adress', 'LIKE',$q);
            });
        });

        
        $query->where($conditions);
        

        if (!empty($request->filter_by)) {
            $myfilter = explode(' ',trim($request->filter_by));
            $query->orderBy($myfilter[0], $myfilter[1]);
        }

        if (!empty($request->data_type)) {
            $scope = \System::auth_type().'s';
            if(!\System::is_admin()){
                $query->$scope()->byStatus($request->data_type)->where('handler',\System::auth_type());
            }else{
                $query->byStatus($request->data_type);
            }            
        }

        if ($request->data_apage == "trashed") {
           $query->onlyTrashed();
        }

        $query->paginate($limit);

        unset($conditions,$cons);

        return $query->paginate($limit);
    }

}