<?php

namespace App\Http\Controllers;

use App\Lists;
use App\System\System;
use App\Helpers\Loader;
use App\Helpers\ListsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        View::share('employees',Loader::employees());
        View::share('providers',Loader::providers());
        View::share('cities',Loader::cities());
        View::share('products',Loader::products());
    }

    public function index(Request $request){
        $lists = lists('',true);
        $result = System::auth_type() != 'admin' ? System::stats(System::auth_type()) : '';
        if($request->ajax()){
            $view = "ar";
            return response()->view($this->listingView , compact('lists','view'))->setStatusCode(200);
        }
        return view($this->listing, compact('lists','result'));
    }

    public function listing(Request $request){
        $lists = ListsHelper::load($request);
        $handler = $request->handler;
        $type = $request->type;
        return response()->view( $this->listingView , compact('lists','handler','type'))->setStatusCode(200);
    }

    public function filter(Request $request){
        $lists  = lists([
            'type'      => $request->data_type,
            'deleted'   => $request->data_apage == 'trashed'
        ], true);
        $view   = "ar";
        
        if(!isset($this->filterView)){
            $filters = [
                'trashed'   => 'element.trashed_table',
                'providers' => 'element.table',
                'employees' => 'element.table',
                'new'       => 'list.new'
            ];
            
            $this->filterView = $filters[$request->data_apage];
        }

        return response_view($this->filterView,compact('lists','view'));
    }

    public function statue(Request $request , $id){
        $message = ListsHelper::setStatus($request,$id);
        return json_success($message);
    }

    public function bulkstatus(Request $request ){
        $lists = Lists::whereIn('id',explode(",",$request->ids))->get();
        foreach ($lists as $list ) {
            $message = ListsHelper::setStatus($request,$list->id);
        }
        return response()->json($message)->setStatusCode(200);
    }

    public function load($id)
    {
        $list = Lists::with("items")->find($id);
        return response_view($this->filterView,compact('lists'));
    }

    
}