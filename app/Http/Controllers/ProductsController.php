<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.index',compact('users'));
    }

    public function store(Request $request)
    {
        $rules = [
            'price'            => 'required|numeric',
            'discount'         => 'numeric',
            'stock'            => 'numeric',
            'ProductThumbnail' => 'required',
          ];
  
  
        $messages = [
            'title.required'            => trans("title.required"),
            'description.required'      => trans("description.required"),
            'price.required'            => trans("price.required"),
            'ProductThumbnail.required' => trans("ProductThumbnail.required"),
        ];

        $request->validate($rules,$messages);

        $Product           = new Products();
        $Product->name     = $request->name;
        $Product->reference    = $request->reference;
        $Product->prix_jmla    = $request->prix_jmla;
        
        $Product->thumbnail = '';

        if($request->hasFile('ProductThumbnail')){
            $Product->thumbnail = $request->ProductThumbnail->store('product',['disk' => 'public']);     
        }

        // delete the old image
        if($request->hasFile('ProductThumbnail') and !empty($request->thumbnail) ){
            $file = public_path().'/uploads/'.$request->thumbnail;
            if(file_exists($file)) {
                unlink($file);
            }
        }

        $Product->save();
        return redirect()->route('admin.products.home')->with('success',trans('product.created'));
    }

    public function edit($id)
    {
        $content    = Products::find($id);
        return view('admin.users.index',compact('content'));
    }

    public function update(Request $request, $id)
    {
        $Product = Products::find($id);
        $Product->name     = $request->name;
        $Product->reference    = $request->reference;
        $Product->prix_jmla    = $request->prix_jmla;        
        
        if($request->hasFile('ProductThumbnail')){
            $Product->thumbnail = $request->ProductThumbnail->store('product',['disk' => 'public']);     
        }

        // delete the old image
        if($request->hasFile('ProductThumbnail') and !empty($request->thumbnail) ){
            $file = public_path().'/uploads/'.$request->thumbnail;
            if(file_exists($file)) {
                unlink($file);
            }
        }

        $Product->save();

        return view('admin.users.index',compact('users'));
    }

    public function delete($id)
    {
        $Product = Products::find($id);
        $Product->delete();
        return redirect()->route('admin.users.home')->with('success',trans('user.deleted'));
    }
}
