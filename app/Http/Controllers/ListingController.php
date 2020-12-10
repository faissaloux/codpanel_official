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
use App\Http\Controllers\Controller;
use App\Helpers\ListsHelper;

class ListingController extends Controller {


    

    public function __construct()
    {
       // dd(        Lists::trashed()->paginate(10)  );

    }

    public function trashed()
    {
        $lists = ListsHelper::trashed(10);
        $cities = Cities::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $employees = Employee::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
        return view('dashboard.listing.index',compact('lists','cities','providers','employees','products'));
    }

    
    public function index()
    {
        $lists = ListsHelper::list_relatives('admin')[0];
        return view('dashboard.listing.index',compact('lists'));
    }

    public function employees()
    {
        $lists = ListsHelper::list_relatives('employee')[0];     

        return view('dashboard.listing.employees', compact('lists'));
    }

    public function providers()
    {
        $lists = ListsHelper::list_relatives('provider')[0];     

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
        $cities = Cities::ordered()->get();
        $users = Provider::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
        $content = Lists::with("items")->find($id);
        return response()->view('dashboard.elements.edit_list', compact('cities','users','products','content'))->setStatusCode(200);
    }

    public function update(Request $request,$id)
    {
        $post =  $request->All();
        $Lists = Lists::find($id);
        $list_id = $this->saveList($Lists,$post);
        $this->saveMultiSale($post,$list_id,true);
        return response()->json(["Success" => "updated successfuly"]);
    }

    public function delete($id)
    {
        Lists::find($id)->delete();
        return redirect()->route('admin.users.home')->with('success', trans('user.deleted'));
    }

    public function destroy($id)
    {
        Lists::find($id)->forceDelete();
        return redirect()->route('admin.users.home') ->with('success', trans('user.deleted'));
    }

    public function restore($id)
    {
        Lists::find($id)->restore();
        return redirect()->route('admin.users.home')->with('success', trans('user.deleted'));
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
        return response()->view('dashboard.elements.listing-table' , compact('lists'))->setStatusCode(200);
    }

    
    public function history($id){
        $history = Lists::select('history')->find($id)->displayHistory();
        return response()->view('dashboard.elements.list_history', compact('history'))->setStatusCode(200);
    }


}