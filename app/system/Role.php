<?php 


namespace App\System;

use App\Admin;
use App\Client;
use App\Employee;
use App\Provider;

class Role {

    public static function new($role){
        switch($role){
            case "admin"    :   return new Admin();
            case "provider" :   return new Provider();
            case "employee" :   return new Employee();
            case 'client'   :   return new Client();
        };
    }

    public static function find($id, $role){
        switch($role){
            case 'admin'    : return Admin::find($id);
            case 'provider' : return Provider::find($id);
            case 'employee' : return Employee::find($id);
        };
    }

    public static function delete($id, $role){
        switch($role){
            case 'admin'    : return Admin::find($id)->delete();
            case 'provider' : return Provider::find($id)->delete();
            case 'employee' : return Employee::find($id)->delete();
            case 'client'   : return Client::find($id)->delete();
        };
    }
}