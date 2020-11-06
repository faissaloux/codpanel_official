<?php

namespace App\Http\Controllers;

use App\Items;
use App\Lists;
use App\Cities;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller {
    

	public function __construct() {
        // if(Auth::user()->role != 'admin'){
        // 	return response()->json([	'error'=> 'you are not allowed to do this' ]);
        // }
    }

    public function index()
    {
        $lists = Lists::orderby('id','desc')->paginate(10);
        return view('dashboard.listing.index',compact('lists'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $post =  $request->getParams();
        /*
        name
        adress
        tel
        cityID
        employee
        prix_de_laivraison
        notes
        ProductID[]
        prix[]
        quantity[]
        */
        $Lists = new Lists();
        $list_id = $this->saveList($Lists,$post,true);
        $this->saveMultiSale($post,$list_id);
        
        return redirect()->route('dashboard.listing.index')->with('success', trans('listing.created'));
    }

    // creating the list OR update 
    public function saveList($model,$post,$checkNumber = false){
        
        $model->name               = $post['name'];
        $model->adress             = $post['adress'];
        $model->tel                = $post['tel'];
        $model->city_id             = $post['city_id'];
        $model->provider_id          = Cities::find($post['city_id'])->user_id;
        $model->laivraison            = $post['prix_de_laivraison'] ;
        $model->employee_id         = $post['employee'] ?? $model->employee_id  ;
       

        if( Auth::user()->role != 'employee' ){
            if($checkNumber  == true ){
               if( $this->checkDuplicatedNumber($post['tel'])){
                   $model->duplicated_at = Carbon::NOW();
               } 
            }
        }

        $model->save();
        return $model->id;
    }

    // the action of saving the products of the listing 
    public function multiSaleProductsSave($post,$list_id){
       for($x=0;$x< count($post['Product_id']);$x++){
            $pro = new Items();
            $pro->list_id    = $list_id;
            $pro->product_id = $post['Product_id'][$x];
            $pro->price     = $post['prix'][$x];
            $pro->quanity   = $post['quantity'][$x];
            $pro->save();
        } 
    }

    // save OR update the products of the order
    public function saveMultiSale($post,$list_id,$update = false){
        if($update){
                Items::where('list_id', $list_id)->delete(); 
                $this->multiSaleProductsSave($post,$list_id);
        }
        else{
            $this->multiSaleProductsSave($post,$list_id);
        }
    }

    public function edit()
    {
        return view('admin.users.create');
    }

    public function update(Request $request,$id)
    {
        $post =  $request->getParams();
        $Lists = Lists::find($id);
        $list_id = $this->saveList($Lists,$post);
        $this->saveMultiSale($post,$list_id,true);
        
        return redirect()->route('admin.citys.home')->with('success', trans('user.created'));
    }

    public function delete($id)
    {
        $Lists = Lists::find($id);
        $Lists->delete();
        return redirect()->route('admin.users.home')->with('success',trans('user.deleted'));
    }

    public function destroy($id)
    {
        $Lists = Lists::find($id);
        $Lists->delete();
        return redirect()->route('admin.users.home')->with('success',trans('user.deleted'));
    }

    public function assign()
    {
        return view('admin.users.create');
    }

    public function restore($id)
    {
        $List = Lists::find($id);
        $List->statue = "";

        $List->save();
        return redirect()->route('admin.users.home')->with('success',trans('user.deleted'));
    }

    public function export()
    {
        return view('admin.users.create');
    }

    public function import()
    {
        return view('admin.users.create');
    }

    public function statue()
    {
        return view('admin.users.create');
    }

    public function load()
    {
        return view('admin.users.create');
    }

    public function history()
    {
        return view('admin.users.create');
    }

    public function listing()
    {
        return view('admin.users.create');
    }


}
