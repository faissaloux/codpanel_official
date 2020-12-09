<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Cities;
use App\Employee;
use App\Products;
use App\Provider;
use App\System\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProvidersController extends Controller
{

    public function index()
    {
        $provider = Auth::guard('providers')->user();
        $result =  System::stats('provider','provider');
        $lists = Lists::orderby('id','desc')
                      ->with('provider','items')
                      ->where('handler','provider')
                      ->where('provider_id', $provider->id)
                      ->paginate(100);
        $cities = Cities::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $employees = Employee::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
        return view('provider.listing', compact('lists','cities','providers','employees','products','provider','logout','result'));
    }

    public function statue(Request $request , $id)
    {
        $status = \Status::list($id)->status($request->statue)->save_status();

        if($status){
            return response()->json(["Success" => "changed successfuly"]);
        }
        
        return response()->json(["Success" => "changed successfuly"]);
    }

    public function load($id)
    {
        $list = Lists::with("items")->find($id);
        return response()->view('provider.elements.list_details', compact('list'))
                         ->setStatusCode(200);
    }

    public function listing(Request $request)
    {
        $auth = Auth::guard('providers')->user();

        $lists = $request->type == "all"
            ?   Lists::with("items")
                            ->orderby('id','desc')
                            ->where('handler','provider')
                            ->where('provider_id', $auth->id)
                            ->paginate(10)
            :   Lists::with("items")
                            ->orderby('id','desc')
                            ->where('handler','provider')
                            ->where('provider_id', $auth->id)
                            ->where('status',$request->type)
                            ->paginate(10);
        
        
        return response()->view('provider.elements.listing-table' , compact('lists'))->setStatusCode(200);
    }

}