<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Provider;
use Illuminate\Http\Request;
use App\Helpers\CitiesHelper;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index(Request $request)
    {
        $cities = Cities::orderby('id','desc')->with('provider')->paginate(10);
        if($request->ajax())
            return response()->view('dashboard.elements.cities_table' , compact('cities'))->setStatusCode(200);
        return view('dashboard.cities.index', compact('cities'));
    }

    public function create()
    {
        $providers = Provider::orderby('id','desc')->get();
        return response()->view('dashboard.elements.add_city', compact('providers'))
                         ->setStatusCode(200);
    }

    public function store(Request $request)
    {
        return CitiesHelper::store($request);
    }

    public function edit($id)
    {
        $content = Cities::find($id);
        $providers = Provider::orderby('id','desc')->get();
        return response()->view('dashboard.elements.edit_city', compact('content','providers'))
                         ->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        return CitiesHelper::update($request, $id);
    }

    public function delete($id)
    {
        return CitiesHelper::delete($id);
    }
}