<?php 


namespace App\System;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


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


    public static function is_employee(){
        return \System::auth_type() == 'employee';
    }

    public static function is_provider(){
        return \System::auth_type() == 'provider';
    }

    public static function is_admin(){
        return \System::auth_type() == 'admin';
    }

    public static function stats($auth = 'employee'){
        $type = self::auth_type();

        if($auth == 'employee' && $type == 'admin')
            $count = 'SELECT count(*) FROM lists where handler="employee"';

        elseif($auth == 'provider' && $type == 'admin')
            $count = 'SELECT count(*) FROM lists where handler="provider"';

        elseif($auth == 'employee' && $type == 'employee'){
            $id = self::employee()->id;
            $count = 'SELECT count(*) FROM lists where handler="employee" and employee_id="'.$id.'"';
        }

        elseif($auth == 'provider'  && $type == 'provider'){
            $id = self::provider()->id;
            $count = 'SELECT count(*) FROM lists where handler="provider" and provider_id="'.$id.'"';
        }


        $result =   DB::select('SELECT 
        ( ' . $count . ' and deleted_at IS NULL ) as `all` ,
        ( ' . $count . ' and STATUS="new" and deleted_at IS NULL ) as  `new` ,
        ( ' . $count . ' and STATUS="canceled" and deleted_at IS NULL ) as  `canceled` ,
        ( ' . $count . ' and STATUS="unanswered" and deleted_at IS NULL ) as `unanswered` ,
        ( ' . $count . ' and STATUS="confirmed" and deleted_at IS NULL ) as `confirmed` ,
        ( ' . $count . ' and STATUS="recall" and deleted_at IS NULL ) as `recall` ,
        ( ' . $count . ' and STATUS="delivred" and deleted_at IS NULL ) as `delivred` ,
        ( ' . $count . ' and STATUS="deleted" and deleted_at IS NULL ) as `deleted` ')[0];

        return $result;
    }

    public static function mergedPaginate($items, $baseUrl = null, $perPage = 5, $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

        if ($baseUrl) {
            $lap->setPath($baseUrl);
        }

        return $lap;
    }
      
}