<?php

namespace App\Helpers;

use App\Products;

class ProductHelper{

    public static function store($request){
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

        $Product            = new Products();
        self::fillData($Product, $request);

        if($request->hasFile('image'))
            $Product->image = $request->image->store('products',['disk' => 'public']);

        $Product->save();
        return redirect()->route('dashboard.products.index')->with('success', trans('product.created'));
    }

    public static function update($request, $id){
        $Product            = Products::find($id);
        self::fillData($Product, $request);        
        
        if($request->hasFile('ProductThumbnail'))
            $Product->thumbnail = $request->ProductThumbnail->store('product',['disk' => 'public']);

        // delete the old image
        if($request->hasFile('image') and !empty($request->image) ){
            $file = public_path().'/uploads/'.$Product->image;
            if(file_exists($file)) unlink($file);
        }

        $Product->save();

        return redirect()->route('dashboard.products.index')->with('success', trans('product.updated'));
    }

    public static function fillData($Product, $request){
        $Product->name      = $request->name;
        $Product->reference = $request->reference;
        $Product->price     = $request->price;
        $Product->prix_jmla = $request->prix_jmla;
    }

    public static function delete($id){
        Products::find($id)->delete();
        return redirect()->route('dashboard.products.index')->with('failed', trans('product.deleted'));
    }

}