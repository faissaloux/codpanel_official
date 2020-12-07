<?php 


namespace App\System;

use App\Product;
use App\Cities;    
use App\User;

class Load {

    public static function products(){
 		if(!isset($_SESSION['products'])){
            $columns = ['id','name','price','reference','prix_jmla'];
            $products = Product::all($columns)->toArray();
            $_SESSION['products'] = $products;
        }else $products = $_SESSION['products'];
        return $products;
    }

    public static function cities(){
		if(!isset($_SESSION['cities'])){
            $columns = ['id','name','provider_id','reference'];
            $cities  = Cities::all($columns)->toArray();
            $_SESSION['cities'] = $cities;
        }else $cities = $_SESSION['cities'];
        return $cities;
    }

    public static function providers(){
  		if(!isset($_SESSION['providers'])){
            $columns = ['id','username','email','deliver_price'];
            $providers = User::providers()->select($columns)->get();
            $providers = $providers->toArray();
            $_SESSION['providers'] = $providers;
        }else $providers = $_SESSION['providers'];
        return $providers;
    }
    
    public static function employees(){
		if(!isset($_SESSION['employees'])){
            $columns = ['id','username','email'];
            $employees = User::employees()->select($columns)->get();
            $employees = $employees->toArray();
            $_SESSION['employees'] = $employees;
        }else $employees = $_SESSION['employees'];
        return $employees;   
    }     
}