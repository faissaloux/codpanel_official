<?php 


namespace App\System;


class System {
    

    public static function admin(){
        return \Auth::guard('admin')->user();
    }

    public static function provider(){
        return \Auth::guard('provider')->user();
    }

    public static function employee(){
        return \Auth::guard('employee')->user();
    }

    public static function color(){
        return (new \App\System\Helper())->random_color();
    }


      
}
