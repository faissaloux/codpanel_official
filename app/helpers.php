<?php

use App\System\System;
use App\Helpers\Listing;

/*  
       usage example :         
       $params = [
            'limit' => 100 ,
            'with' => ['employee','provider','items'] ,
            'type' => 'new',
            'returned' => 'object',
            'handler' => 'employee',
            'provider' => '1',
            'employee' => '1',
            'product' => '1',
            'city' => '9',
            'order_by' => 'created_at desc',
            'date' => 'November 18, 2020 - December 17, 2020',
            'search' => '000000000000000',
            'deleted' => true
        ];
        
        $lists = lists($params);

        if you like to get results only :
        
        $params = parameters of listing
        $auth = Current logged in auth type
        $result = return only result

        $lists = lists($params,$auth,$result);
*/

function lists($params = null,$result = false){
    $config = [
        'employee'  =>  config('lists.employee'),
        'provider'  =>  config('lists.provider'),
        'admin'     =>  config('lists.new'),
    ];

    if($params == null){
        $params = $config[System::auth_type()];
    }
    if(!$result){
        return new Listing($params);
    }
    return (new Listing($params))->result;
}


function stats($params){
    return new Stats($params);
}

function json_success($message){
    return response()->json(["Success" => $message]);
}

function get_view($name){
    $views = [
        'element.history'       => 'dashboard.elements.list_history',
        'element.table'         => 'dashboard.elements.listing-table',
        'element.trashed_table' => 'dashboard.elements.trashed_listing_table',
        'list.details'          => 'dashboard.elements.list_details',
        'list.edit'             => 'dashboard.elements.edit_list',
        'list.add'              => 'dashboard.elements.add_list',
        'list.index'            => 'dashboard.listing.index',
        'list.provider'         => 'dashboard.listing.providers',
        'list.employee'         => 'dashboard.listing.employees',
        'list.trashed'          => 'dashboard.listing.trashed',
        'list.new'              => 'dashboard.elements.new_listing_table',

        'e.add_list'            => 'employee.elements.add_list',
        'e.edit_list'           => 'employee.elements.edit_list',
    ];
    return $views[$name];
}

function response_view($view,$array){
    return response()->view( get_view($view) , $array)->setStatusCode(200);
}