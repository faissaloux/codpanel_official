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

class ListingController extends Controller {


	public function __construct() {
        // if(Auth::user()->role != 'admin'){
        // 	return response()->json([	'error'=> 'you are not allowed to do this' ]);
        // }
    }

    public function index()
    {
        $lists = Lists::orderby('id','desc')->with('provider','items')->paginate(10);
        $cities = Cities::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $employees = Employee::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();

        return view('dashboard.listing.index',compact('lists','cities','providers','employees','products'));
    }

    public function employees()
    {
        $lists = Lists::employees()->orderby('id','desc')->where('handler','employee')->paginate(10);
        $result = System::stats('admin','employee');
        $cities = Cities::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $employees = Employee::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();        

        return view('dashboard.listing.employees', compact('lists','cities','providers','employees','products','result'));
    }

    public function providers()
    {
        $lists = Lists::providers()->orderby('id','desc')->where('handler','provider')->paginate(10);
        $result =  System::stats('admin','provider');
        $cities = Cities::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $employees = Employee::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();

        return view('dashboard.listing.providers', compact('lists','cities','providers','employees','products','result'));
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
        $users = User::orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();
        $content = Lists::with("items")->find($id);
        return response()->view('dashboard.elements.edit_list', compact('cities','users','products','content'))
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

    public function delete($id)
    {
        Lists::find($id)->delete();
        return redirect()->route('admin.users.home')
                         ->with('success', trans('user.deleted'));
    }

    public function destroy($id)
    {
        Lists::find($id)->delete();
        return redirect()->route('admin.users.home')
                         ->with('success', trans('user.deleted'));
    }

    public function restore($id)
    {
        $List = Lists::find($id);
        $List->statue = "";

        $List->save();
        return redirect()->route('admin.users.home')
                         ->with('success', trans('user.deleted'));
    }

    public function statue(Request $request , $id)
    {
        // $List = Lists::find($id);
        // $List->status = $request->statue;
        // $List->save();

        $status = \Status::list($id)->status($request->statue)->save_status();

        if($status){
            return response()->json(["Success" => "changed successfuly"]);
        }

        return response()->json(["error" => "changed unsuccessfuled"]);
    }

    public function load($id)
    {
        $list = Lists::with("items")->find($id);
        return response()->view('dashboard.elements.list_details', compact('list'))
                         ->setStatusCode(200);
    }

    public function listing(Request $request)
    {

        if($request->handler == "employee"){
            $lists = $request->type == "all"
                ?   Lists::employees()
                                ->orderby('id','desc')
                                ->where('handler','employee')
                                ->paginate(10)
                :   Lists::with("items")
                                ->orderby('id','desc')
                                ->where('handler','employee')
                                ->where('status',$request->type)
                                ->paginate(10);
        }
        if($request->handler == "provider"){
            $lists = $request->type == "all" 
                ?   Lists::with("items")
                                ->orderby('id','desc')
                                ->where('handler','provider')
                                ->paginate(10)
                :   Lists::with("items")
                                ->orderby('id','desc')
                                ->where('handler','provider')
                                ->where('status',$request->type)
                                ->paginate(10);
        }
        
        
        return response()->view('dashboard.elements.listing-table' , compact('lists'))->setStatusCode(200);
    }

    public function history($id){
        $lists = Lists::where('id', $id)->orderby('id','desc')->get('history');
        //$history = $lists->displayHistory();
        return response()->view('dashboard.elements.list_history', compact('lists'))
                         ->setStatusCode(200);

        //return response(view('dashboard.elements.list_history', json_decode($lists)),200);
    }


}