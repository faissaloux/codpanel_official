<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Helpers\ListsHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    public $listingView = 'employee.elements.listing-table';
    public $listDetails = 'employee.elements.list_details';
    public $listing = 'employee.listing';
    public $filterView = 'employee.elements.listing-table';

    public function create(){
        $auth = Auth::guard('employees')->user();
        return response_view('e.add_list',compact('auth'));
    }

    public function store(Request $request){
        ListsHelper::store($request);
        return json_success('saved.successfuly');
    }

    public function edit($id){
        $auth = Auth::guard('employees')->user();
        $content = Lists::with("items")->find($id);
        return response_view('e.edit_list',compact('content','auth'));
    }

    public function update(Request $request,$id){
        ListsHelper::update($request,$id);
        return json_success('updated.successfuly');
    }

    

}