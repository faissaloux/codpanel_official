<?php 

namespace App\System;
use \App\System\Listing;


/*
statue::List($id)->statue($request->statue)->save()
*/


class Status extends Listing {

    public static $by ;
    public static $status;
    public static $list ;
    public static $history;
    public static $status_types ;
    

    public static $message = [
        "new" => "طلب جديد",
        "canceled" => "طلب ملغي",
        "confirmed" => "مؤكد طلب",
        "unanswered" => "دون إجابة طلب",
        "recall" => "اعادة الاتصال",
        "returned" => "تم إرجاع الطلب",
        "delivred" => "تم توصيل الطلب",
    ];

    public function __construct() {
        $this->by();
        self::$status_types = array_keys(self::$message);
    }

    public function by(){
        self::$by = \System::current_auth()->name;
        return $this;
    }

    public static function status($status){
        if($status == "confirmed"){
            self::$list->handler = "provider";
        }
        self::$status = $status;
        return new self;
    }

    public static function list($id){
        self::$list = self::find($id);
        return new self;
    }

    public static function history(){

        $history = (object)[ array('message'=> self::$message[self::$status] , 'by'=> self::$by , 'date'=> \Carbon\Carbon::now() )];

        self::$history =  $history;
        unset($history);
        return self::$history;
    }
    
    public static function appendToHistory(){
        $old_history = json_decode(self::$list->history, true);
        array_push($old_history,self::history());
        $history = json_encode($old_history, JSON_UNESCAPED_UNICODE);
        return $history;
    }

    public static function save_status(){
        self::$list->status = self::$status;
        $history = empty(self::$list->history) ? json_encode(self::history(), JSON_UNESCAPED_UNICODE) : self::appendToHistory();
        self::$list->history = $history;
        self::$list->save();
        unset($history);
        return true;
    }


}