<?php

namespace App\Http\Controllers;

use App\Lists;
use App\System\System;
use App\Helpers\ListsHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ListingController extends Controller {

    public $listing = 'dashboard.listing.index';
    public $listingView = 'dashboard.elements.new_listing_table';


    public function trashed(Request $request){   
        $lists = lists(config('lists.trashed'),true);
        if($request->ajax()){
            return response_view('element.trashed_table',compact('lists'));
        }
        return response_view('list.trashed',compact('lists'));
    }

    public function employees(Request $request){
        $lists = lists(config('lists.employee'),true);
        $result = System::stats('employee');
        if($request->ajax()){
            $view = "employee";
            return response_view('element.table',compact('lists','view'));
        }
        return response_view('list.employee',compact('lists','result'));
    }

    public function providers(Request $request){
        $lists = lists(config('lists.provider'),true);
        $result = System::stats('provider');
        if($request->ajax()){
            $view = "provider";
            return response_view('element.table',compact('lists','view'));
        }
        return response_view('list.provider',compact('lists','result'));
    }

    public function new(){
        $lists = Lists::new()->paginate(10);
        return response_view('list.index',compact('lists'));
    }

    public function create(){
        return response_view('list.add',compact(''));
    }

    public function store(Request $request){
        ListsHelper::store($request);
        return json_success('saved.successfuly');  
    }

    public function update(Request $request,$id){
        ListsHelper::update($request,$id);
        return json_success('list.updated');  
    }

    public function delete($id){
        Lists::find($id)->delete();        
        return json_success('List.deleted.successfuly');
    }

    public function destroy($id){
        Lists::onlyTrashed()->find($id)->forceDelete();        
        return json_success('List.destroyed.successfuly');
    }

    public function restore($id){
        Lists::onlyTrashed()->find($id)->restore();
        return json_success('List.restored.successfully');
    }

    public function listing(Request $request){
        $lists = ListsHelper::load($request);
        $handler = $request->handler;
        $type = $request->type;
        return response_view('element.table',compact('lists','handler','type'));
    }

    public function history($id) {
        $history = Lists::select('history')->find($id)->displayHistory();
        return response_view('element.history',compact('history'));
    }

    public function load($id) {
        $list = Lists::with('items')->find($id);
        return response_view('list.details',compact('list'));
    }

    public function edit($id){
        $content = Lists::with('items')->find($id);
        return response_view('list.edit',compact('content'));
    }

    public function statue(Request $request , $id) {
        $message = ListsHelper::setStatus($request,$id);
        return json_success($message);
    }


    
    

    
}