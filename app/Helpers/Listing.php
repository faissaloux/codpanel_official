<?php

namespace App\Helpers;

use App\Lists;
use App\System\Status;
/*
    $params = [
        'limit',......
    ];
    usage  :    $lists = new Api($params);
*/


class Listing {

    
    public $query;
    public $limit_by_default = 5;
    public $return_by_default = 'object';
    public $handlers = ['employee','provider'];
    public $order_bys = ['created_at','name','updated_at','asc','desc'];
    public $default_with = ['employee','provider','items'];
    public $deleted_by_default =  false;
    
    public $limit;
    public $type;
    public $handler;
    public $provider;
    public $employee;
    public $product;
    public $city;
    public $order_by;
    public $date;
    public $with;
    public $search;
    public $deleted;
    public $result;
    public $returned;

    public function __construct($params)
    {
        // set the params
        foreach($params as $key => $val){
            if(property_exists($this,$key)){
                $this->$key = $val;
            }
        }
        // set the status list
        $this->statuesList = Status::statuesList();
        
        $this->init();
        return $this->get();
    }

    public static function setupDate($date){
        return \Carbon\Carbon::createFromFormat('M d, Y', trim($date))->toDateString();
    }

    public static function setupDateBetween($date){
        return \Carbon\Carbon::createFromFormat('M d, Y', trim($date))->addDays(1)->toDateString();
    }

  
    public function type(){
        if(!empty($this->type) and is_string($this->type) and  in_array($this->type,$this->statuesList)){
            $this->query->where('status',$this->type);
        }
        return $this;
    }

    
    public function handler(){
        if(!empty($this->handler) and  is_string($this->handler) and in_array($this->handler,$this->handlers)){
            $handler = $this->handler.'s';
            $this->query->$handler();
        }
        return $this;
    }

    public function employee(){
        if(is_array($this->employee)){
            $this->query->whereIn('employee_id',$this->employee);
        }elseif(is_numeric($this->employee)){
            $this->query->where('employee_id',$this->employee);
        }
        return $this;
    }


    public function provider(){
        if(is_array($this->provider)){
            $this->query->whereIn('provider_id',$this->provider);
        }elseif(is_numeric($this->provider)){
            $this->query->where('provider_id',$this->provider);
        }
        return $this;
    }

    
    public function init(){
        $this->query = Lists::query();
        if(!empty($this->with) and is_array($this->with)){
            $this->query->with($this->with);
        }elseif(!empty($this->with) and !is_array($this->with)) {
            $this->query->with([$this->with]);
        }else{
            $this->query->with($this->default_with);
        }
        return $this;
    }
    

    public function deleted(){
        if(empty($this->deleted)){
            $this->deleted = $this->deleted_by_default;
        }
        if(is_bool($this->deleted)){
            $where = $this->deleted == true ?  'whereNotNull' : 'whereNull';
            $this->query->$where('deleted_at');
            unset($where);
        }
        return $this;
    }


    public function city(){
        if(is_numeric($this->city)){
            $this->query->where('city_id',$this->city);
        }
        return $this;
    }

    public function order_by(){
        
        if(is_string($this->order_by)){
            $myfilter = explode(' ',trim($this->order_by));
            if(is_string($myfilter[0]) and is_string($myfilter[1]) and in_array($myfilter[0],$this->order_bys) and in_array($myfilter[1],$this->order_bys)){
                $this->query->orderBy($myfilter[0], $myfilter[1]);
            }
        }else{
            $this->query->orderBy('id','desc');
        }
        
        return $this;
    }

    public function product(){
        if(is_numeric($this->product)){
            $this->query->byProduct($this->product);
        }
        return $this;
    }

    public function date(){
        
        if(!empty($this->date)){
            $date = explode("-",trim($this->date));
            if(trim($date[0]) == trim($date[1])){
                $this->query->whereDate('created_at', self::setupDate($date[0]));
            }else{
                $this->query->whereBetween('created_at', [self::setupDateBetween($date[0]), self::setupDateBetween($date[1])]);
            }
        }
            
        return $this;
    }

    public function search(){
        if(!empty($this->search)){
            $q = '%'.$this->search.'%';
            $this->query->when(!empty($this->search) , function() use($q){
                $this->query->where(function($query) use($q) {
                    return $query->where('name', 'LIKE',$q)->orWhere('phone', 'LIKE',$q)->orWhere('adress', 'LIKE',$q);
                });
            });
            unset($q);
        }
        return $this;
    }

    public function limit(){
        if(!empty($this->limit) and is_numeric($this->limit) and $this->limit > 0  and $this->limit < 300 ){
            $pg_limit = $this->limit;
        }else{
            $pg_limit = $this->limit_by_default;
        }
        return $pg_limit;
    }


    public function return_by($return,$limit){
        if($return == 'json'){
            $this->result = $this->query->get()->toJson();
        }
        elseif($return == 'array'){
            $this->result = $this->query->get()->toArray();
        }
        elseif($return == 'object'){
            $this->result = $this->query->paginate($limit);
        }
        unset($return);
        return $this;
    }


    public function returned(){
        $return_types = ['array','json','object'];
        if(!empty($this->returned) and is_string($this->returned) and in_array($this->returned,$return_types) ){
            $this->return_by($this->returned,$this->limit());
        }else {

            $this->return_by($this->return_by_default,$this->limit());
        }
        unset($return_types);
        return $this;
    }



    public function get(){
        $this->type()->handler()->provider()->employee()->deleted()->city()->order_by()->product()->date()->search()->returned();
        return $this->result;
    }




    
}