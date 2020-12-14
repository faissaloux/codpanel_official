<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Products::paginate(10);
        if($request->ajax())
            return response()->view('dashboard.elements.products_table' , compact('products'))->setStatusCode(200);
        return view('dashboard.products.index',compact('products'));
    }

    public function store(Request $request)
    {
        return \ProductHelper::store($request);
    }

    public function edit($id)
    {
        $content = Products::find($id);
        return view('dashboard.products.edit',compact('content'));
    }

    public function update(Request $request, $id)
    {
        return \ProductHelper::update($request, $id);
    }

    public function delete($id)
    {
        return \ProductHelper::delete($id);
    }
}