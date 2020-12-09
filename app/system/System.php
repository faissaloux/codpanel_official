<?php 


namespace App\System;

use Illuminate\Support\Facades\DB;


class System {
    public static $roles = ['admin', 'provider', 'employee', 'client'];

    public static function admin(){
        return \Auth::guard('admin')->user();
    }

    public static function provider(){
        return \Auth::guard('providers')->user();
    }

    public static function employee(){
        return \Auth::guard('employees')->user();
    }

    public static function color(){
        return (new \App\System\Helper())->random_color();
    }
    
    public static function current_auth(){
        if(\Auth::guard('providers')->check() == 'providers'){
            return \Auth::guard('providers')->user();
        }
        elseif(\Auth::guard('employees')->check() == 'employees'){
            return \Auth::guard('employees')->user();
        }
        elseif(\Auth::guard('admin')->check() == 'admin'){
            return \Auth::guard('admin')->user();
        }
    }

    public static function auth_type(){

        if(\Auth::guard('providers')->check() == 'providers'){
            return 'provider';
        }
        elseif(\Auth::guard('employees')->check() == 'employees'){
            return 'employee';
        }
        elseif(\Auth::guard('admin')->check() == 'admin'){
            return 'admin';
        }

        
    }

    public static function stats($auth = 'admin',$type = 'employee'){

        if($type == 'employee' && $auth == 'admin')
            $count = 'SELECT count(*) FROM lists where handler="employee"';

        if($type == 'provider' && $auth == 'admin')
            $count = 'SELECT count(*) FROM lists where handler="provider"';

        if($auth == 'employees' && $type == 'employees'){
            $id = self::employee()->id;
            $count = 'SELECT count(*) FROM lists where handler="employee" and employee_id="'.$id.'"';
        }

        if($auth == 'provider'  && $type == 'provider'){
            $id = self::provider()->id;
            $count = 'SELECT count(*) FROM lists where handler="provider" and provider_id="'.$id.'"';
        }
        


        $result =   DB::select('SELECT 
        ( ' . $count . ' ) as al ,
        ( ' . $count . ' and STATUS="new" ) as  new ,
        ( ' . $count . ' and STATUS="canceled" ) as  canceled ,
        ( ' . $count . ' and STATUS="unanswered" ) as unanswered ,
        ( ' . $count . ' and STATUS="confirmed" ) as confirmed ,
        ( ' . $count . ' and STATUS="recall" ) as recall ,
        ( ' . $count . ' and STATUS="delivred" ) as delivred ,
        ( ' . $count . ' and STATUS="deleted" ) as deleted ')[0];

        return $result;

    }


      
}