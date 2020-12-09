<?php

namespace App\Http\Controllers;

use App\User;
use App\Items;
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

class EmployeesController extends Controller
{
 
    public function index()
    {
        $employee = Auth::guard('employees')->user();
        $result =  System::stats('employees','employees');
        $lists = Lists::orderby('id','desc')
                      ->with('provider','items')
                      ->where('handler','employee')
                      ->where('employee_id', $employee->id)
                      ->paginate(10);
        $cities = Cities::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
        return view('employee.listing', compact('lists','cities','providers','employee','products','result'));
    }

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
        $post =  $request->All();
        $Lists = new Lists();
        $list_id = $this->saveList($Lists,$post,true);
        $this->saveMultiSale($post,$list_id);
        return response()->json(["Success" => "saved successfuly"]);
    }

    // creating the list OR update
    public function saveList($model,$post, $checkNumber = false){

        $model->name            = $post['name'];
        $model->adress          = $post['adress'];
        $model->phone           = $post['tel'];
        $model->city_id         = $post['cityID'];
        $model->provider_id     = Cities::find($post['cityID'])->provider_id ?? NULL;
        $model->laivraison      = $post['prix_de_laivraison'] ;
        $model->employee_id     = $post['employee'] ?? $model->employee_id  ;


        // if( Auth::user()->role != 'employee' ){
        //     if($checkNumber  == true ){
        //        if( $this->checkDuplicatedNumber($post['tel'])){
        //            $model->duplicated_at = Carbon::NOW();
        //        }
        //     }
        // }

        $model->save();
        return $model->id;
    }

    // the action of saving the products of the listing
    public function multiSaleProductsSave($post,$list_id){
       for($x=0, $count=count($post['ProductID']); $x < $count; $x++){
            $pro             = new Items();
            $pro->list_id    = $list_id;
            $pro->product_id = $post['ProductID'][$x];
            $pro->price      = $post['prix'][$x];
            $pro->quantity   = $post['quantity'][$x];
            $pro->save();
        }
    }

    // save OR update the products of the order
    public function saveMultiSale($post,$list_id,$update = false){
        if($update){
                Items::where('list_id', $list_id)->delete();
                $this->multiSaleProductsSave($post,$list_id);
        }
        else $this->multiSaleProductsSave($post,$list_id);
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
        $post =  $request->All();
        $Lists = Lists::find($id);
        $list_id = $this->saveList($Lists,$post);
        $this->saveMultiSale($post,$list_id,true);
        return response()->json(["Success" => "updated successfuly"]);
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
        return response()->view('employee.elements.list_details', compact('list'))
                         ->setStatusCode(200);
    }

    public function listing(Request $request)
    {
        $auth = Auth::guard('employees')->user();


        switch($request->type){
            case 'all' : $lists = Lists::employees() ->orderby('id','desc') ->where('employee_id', $auth->id) ->paginate(10); break;
            case 'confirmed' : $lists =  Lists::with("items") ->orderby('id','desc') ->where('employee_id', $auth->id) ->where('status',$request->type) ->paginate(10); break;
            default  : $lists = Lists::employees()->with("items") ->orderby('id','desc') ->where('employee_id', $auth->id) ->where('status',$request->type) ->paginate(10);
        }
        
        
        return response()->view('employee.elements.listing-table' , compact('lists'))->setStatusCode(200);
    }

}