<?php

namespace App\Http\Controllers;

use App\Lists;
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
        $lists = ListsHelper::list_relatives(\System::auth_type())[0];
        if($request->ajax()){
            $lists = $lists['lists'];
            $view = "ar";
            return response()->view($this->listingView , compact('lists','view'))->setStatusCode(200);
        }
        return view($this->listing, compact('lists'));
    }

    public function listing(Request $request){
        $lists = ListsHelper::load($request);
        if(\System::auth_type() == 'employee'){
            $lists = \System::mergedPaginate($lists,'/employee/listing?handler='.$request->handler.'&type='.$request->type.'');
        }elseif(\System::auth_type() == 'provider'){
            $lists = \System::mergedPaginate($lists,'/provider/listing?handler='.$request->handler.'&type='.$request->type.'');
        }
        
        return response()->view( $this->listingView , compact('lists'))->setStatusCode(200);
    }

    public function filter(Request $request){
        $lists = ListsHelper::list_relatives(\System::auth_type(),$request)[0];
        $view = "ar";
        $lists = $lists['lists'];
        if(!$this->filterView){
            $filters = [
                'trashed' => 'dashboard.elements.trashed_listing_table',
                'providers' => 'dashboard.elements.listing-table',
                'employees' => 'dashboard.elements.listing-table',
                'new' => 'dashboard.elements.new_listing_table'
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