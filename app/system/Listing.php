<?php 

namespace App\System;
use \App\Models\Lists;
use App\System\Helpers\Paginator;



class Listing extends Lists {
    
    public static $limit = 20;


    // Relations
    public function products(){
       return $this->hasMany('\App\Models\Items','list_id');
    }
    
    public function provider(){
       return $this->belongsTo('\App\Models\User','provider_id'); 
    }

    public function assistant(){
       return $this->belongsTo('\App\Models\User','employee_id');
    }

    public function city(){
        return $this->belongsTo('\App\Models\Cities','city_id')->withDefault(['city' => 'N-A']);
    }

    // load relationShips
    public function scopeFull($query){
       return $query->with('deliver','assistant','products','products.product','city');
    }

    // scope roles
    public function scopeProvider($query,$id){
    	$query->where('provider_id',$id);
    }
    public function scopeEmployee($query,$id){
    	$query->where('employee_id',$id);
    }
    public function scopeCity($query,$id){
    	$query->where('city_id',$id);
    }
    public function scopeProduct($query,$id){
    	$query->whereHas('products', function ($query,$id) {
            return $query->where('product_id', $id);
        });
    }


    // global scopes
    public function scopeDuplicated($query){
    	$query->whereNotNull('duplicated_at');
    }
    public function scopeConfirmation($query){
    	$query->where('status','confirmation');
    }



    // Scopes For Employees
    public function scopeEmployeeWaiting($query){
    	$query->where('status','employeeWaiting');
    }
    public function scopeEmployeeCanceled($query){
    	$query->where('status','employeeCanceled');
    }
    public function scopeEmployeeUnanswered($query){
    	$query->where('status','employeeUnanswered');
    }
    public function scopeEmployeeRecall($query){
    	$query->where('status','employeeRecall');
    }


    // Scopes For Provider
    public function scropeProviderWaiting($query){
    	$query->where('status','providerWaiting');
    }
    public function scropeProviderCanceled($query){
    	$query->where('status','providerCanceled');
    }
    public function scropeProviderUnanswered($query){
    	$query->where('status','providerUnanswered');
    }
    public function scropeProviderRecall($query){
    	$query->where('status','providerRecall');
    }
    public function scropeProviderDelivred($query){
    	$query->where('status','providerDelivred');
    }


    public static function paginate(){
        
        $limit     = $_GET['limit'] ?? Self::$limit;
        $page      = $_GET['page'] ?? 1 ;
        $count     = self::count();
        $lastpage  = ( ceil($count / $limit ) == 0 ? 1 : ceil($count / $limit ));   
        $skip      = ($page - 1) * $limit;

        return self::skip($skip)->take($limit)->get();

        $url        = $_GET;
        if(empty($url) and !is_array($url)){
            $url = [];
        }
        unset($url['page']);
        $URLparams  = http_build_query($url);
        $urlPattern = !empty($URLparams) ? '?'.$URLparams. "&page=(:num)" : "?page=(:num)";

        $pagination = new Paginator($count, $limit, $page, $urlPattern);


    }


}


