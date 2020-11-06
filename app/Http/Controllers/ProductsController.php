<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::All();
        return view('dashboard.products.index',compact('products'));
    }

    public function create()
    {
        return view('dashboard.products.create',compact('products'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name'           => 'required',
            'prix_jmla'      => 'required|numeric',
            'reference'      => 'required',
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

        if($request->hasFile('image')){
            $Product->image = $request->image->store('products',['disk' => 'public']);
        }

        $Product->save();
        return redirect()->route('dashboard.products.index')->with('success', trans('product.created'));
    }

    public function edit($id)
    {
        $content    = Products::find($id);
        return view('dashboard.products.edit',compact('content'));
    }

    public function update(Request $request, $id)
    {
        $Product = Products::find($id);
        $Product->name     = $request->name;
        $Product->reference    = $request->reference;
        $Product->price = $request->price;
        $Product->prix_jmla    = $request->prix_jmla;        
        
        if($request->hasFile('ProductThumbnail')){
            $Product->thumbnail = $request->ProductThumbnail->store('product',['disk' => 'public']);     
        }

        // delete the old image
        if($request->hasFile('image') and !empty($request->image) ){
            $file = public_path().'/uploads/'.$Product->image;
            if(file_exists($file)) {
                unlink($file);
            }
        }

        $Product->save();

        return redirect()->route('dashboard.products.index')->with('success', trans('product.updated'));
    }

    public function delete($id)
    {
        $Product = Products::find($id);
        $Product->delete();
        return redirect()->route('dashboard.products.index')->with('failed', trans('product.deleted'));
    }
}
