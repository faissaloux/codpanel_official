<?php

namespace App\Http\Controllers;

use App\User;
use App\Items;
use App\Lists;
use App\Cities;
use App\Employee;
use App\Products;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ListsHelper;

class ListingController extends Controller {

    public $listing = 'dashboard.listing.index';
    public $listingView = 'dashboard.elements.new_listing_table';

    public function trashed(Request $request)
    {
        $lists = ListsHelper::list_relatives('trashed')[0];
        if($request->ajax()){
            $lists = $lists['lists'];
            return response()->view('dashboard.elements.trashed_listing_table' , compact('lists'))->setStatusCode(200);
        }
        return view('dashboard.listing.trashed',compact('lists'));
    }

    public function employees(Request $request)
    {
        $lists = ListsHelper::list_relatives('employee')[0];
        if($request->ajax()){
            $lists = $lists['lists'];
            $view = "employee";
            return response()->view('dashboard.elements.listing-table' , compact('lists','view'))->setStatusCode(200);
        }
        return view('dashboard.listing.employees', compact('lists'));
    }

    public function providers(Request $request)
    {
        $lists = ListsHelper::list_relatives('provider')[0];     
        if($request->ajax()){
            $lists = $lists['lists'];
            $view = "provider";
            return response()->view('dashboard.elements.listing-table' , compact('lists','view'))->setStatusCode(200);
        }
        return view('dashboard.listing.providers', compact('lists'));
    }

    public function new()
    {
        $lists = Lists::new()->paginate(10);
        return view('dashboard.listing.index', compact('lists'));
    }

    public function create()
    {
        $cities = Cities::orderby('id','desc')->get();
        $users = User::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
        return response()->view('dashboard.elements.add_list', compact('cities','users','products'))
                         ->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $post =  $request->All();
        $Lists = new Lists();
        $list_id = ListsHelper::saveList($Lists,$post,true);
        ListsHelper::saveMultiSale($post,$list_id);
        return response()->json(["Success" => "saved successfuly"]);
    }

    public function edit($id)
    {
        $cities = Cities::ordered()->get();
        $users = Provider::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
        $content = Lists::with("items")->find($id);
        return response()->view('dashboard.elements.edit_list', compact('cities','users','products','content'))->setStatusCode(200);
    }

    public function update(Request $request,$id)
    {
        ListsHelper::update($request,$id);
        return response()->json(["Success" => "updated successfuly"]);
    }

    public function delete($id)
    {
        Lists::find($id)->delete();
        return response()->json(["Success" => "List deleted successfuly"]);
    }

    public function destroy($id)
    {
        Lists::onlyTrashed()->find($id)->forceDelete();
        return response()->json(["Success" => "List destroyed successfuly"]);
    }

    public function restore($id)
    {
        Lists::onlyTrashed()->find($id)->restore();
        return response()->json(['Success' => 'List restored successfully']);
    }

    public function statue(Request $request , $id)
    {   
        $message = ListsHelper::setStatus($request,$id);
        return response()->json($message);
    }

    public function load($id)
    {
        $list = Lists::with("items")->find($id);
        return response()->view('dashboard.elements.list_details', compact('list'))->setStatusCode(200);
    }

    public function listing(Request $request)
    {
        $lists = ListsHelper::load($request);
        $lists = \System::mergedPaginate($lists,'/dashboard/listing/listing?handler='.$request->handler.'&type='.$request->type.'');
        return response()->view('dashboard.elements.listing-table' , compact('lists'))->setStatusCode(200);
    }

    
    public function history($id){
        $history = Lists::select('history')->find($id)->displayHistory();
        return response()->view('dashboard.elements.list_history', compact('history'))->setStatusCode(200);
    }


}