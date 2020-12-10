<?php 

namespace App\System;
use \App\System\Listing;


/*
    usage example
    statue::List($id)->statue($request->statue)->reason($request->reason)->save_status();
*/


class Status extends Listing {

    public static $by ;
    public static $role ;
    public static $status;
    public static $list ;
    public static $history;
    public static $status_types ;
    public static $current_time ;
    public static $cancel_reason ;

    public static $message = [
        "new" => "طلب جديد",
        "canceled" => "طلب ملغي",
        "confirmed" => "مؤكد طلب",
        "unanswered" => "دون إجابة طلب",
        "recall" => "اعادة الاتصال",
        "returned" => "تم إرجاع الطلب",
        "delivred" => "تم توصيل الطلب",
    ];


    public static function statuesList(){
        return  array_keys(self::$message);
    }

    public function __construct() {
        $this->by();
        self::$current_time = \Carbon\Carbon::now()->toDateTimeString() ;
        self::$status_types = array_keys(self::$message);
    }

    public function by(){
        self::$by = \System::current_auth()->name;
        self::$role = \System::auth_type();
        return $this;
    }

    public static function recall_at($recall_at){
        self::$list->recall_at = $recall_at;
        return new self;
    }


    public static function status($status){
        
        if(in_array($status,array_keys(self::$message))){
            $statue = $status.'_at';
            self::$list->$statue = self::$current_time ; 
        }
        
        self::$status = $status;
        unset($status,$statue);
        return new self;
    }

    public static function list($id){
        self::$list = self::find($id);
        unset($id);
        return new self;
    }

    public static function reason($reason){
        self::$list->cancel_reason = $reason;
        unset($reason);
        return new self;
    }

    public static function history(){
        $history = [['message'=> self::$message[self::$status] ,  'by'=> self::$by , 'role'=> self::$role , 'date'=> self::$current_time ]];
        self::$history =  $history;
        unset($history);
        return self::$history;
    }

    public static function appendToHistory(){
        self::saveList(array_merge(json_decode(self::$list->history,true),self::history()));
    }

    public static function save_status(){
        self::$list->status = self::$status;
        if(!empty(self::$list->history)){
            self::appendToHistory();
        }else {
            self::saveList(json_encode(self::history(), JSON_UNESCAPED_UNICODE));
        }
        return true;
    }
    
    public static function saveList($history){
        self::$list->history = $history;
        unset($history);
        return self::$list->save();    
    }

}