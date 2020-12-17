<?php

namespace App\Helpers;
use App\{Cities,Provider,Employee , Products};

class Loader {

    public static function setup($name, $model,$colmns){
        if(!isset($_SESSION[$name])){
            $_SESSION[$name] = $model->select($colmns)->orderby('id','DESC')->get();
        }
        return $_SESSION[$name];
    }

    public static function products(){
       return self::setup('products',Products::query(),['id','name']);
    }

    public static function employees(){
       return self::setup('employees',Employee::query(),['id','name']);
    }

    public static function providers(){
       return self::setup('providers',Provider::query(),['id','name']); 
    }

    public static function cities(){
       return self::setup('cities',Cities::query(),['id','name']);
    }
    
}