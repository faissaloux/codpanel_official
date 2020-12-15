<?php

namespace App\Http\Controllers;

use App\Items;
use App\Lists;
use App\Cities;
use App\Products;
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

    public function create()
    {
        $cities = Cities::orderby('id','desc')->get();
        $auth = Auth::guard('employees')->user();
        $products = Products::orderby('id','desc')->get();
        return response()->view('employee.elements.add_list', compact('cities','auth','products'))
                         ->setStatusCode(200);
    }

    public function store(Request $request)
    {
        ListsHelper::store($request);
        return response()->json(["Success" => "saved successfuly"]);
    }

    public function edit($id)
    {
        $cities = Cities::orderby('id','desc')->get();
        $auth = Auth::guard('employees')->user();
        $products = Products::orderby('id','desc')->get();
        $content = Lists::with("items")->find($id);
        return response()->view('employee.elements.edit_list', compact('cities','auth','products','content'))
                         ->setStatusCode(200);
    }

    public function update(Request $request,$id)
    {
        ListsHelper::update($request,$id);
        return response()->json(["Success" => "updated successfuly"]);
    }

    

}