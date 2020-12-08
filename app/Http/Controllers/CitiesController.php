<?php

namespace App\Http\Controllers;

use App\Cities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = Cities::orderby('id','desc')->with('provider')->paginate(10);
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
        $rules = [
            'name'        => 'required|min:3',
            'reference'   => 'required|min:2',
            'provider_id' => 'required|min:1',
        ];
  
        $messages = [
            'name.required'         => trans("name.required"),
            'reference.required'    => trans("reference.required"),
            'provider_id.required'  => trans("provider_id.required"),
        ];
        
        $request->validate($rules,$messages);

        $city               = new Cities();
        $city->name         = $request->name;
        $city->reference    = $request->reference;
        $city->provider_id  = $request->provider_id;
        $city->save();

        return response()->json(["Success" => "saved successfuly"]);
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
        $city               = Cities::find($id);
        $city->name         = $request->name;
        $city->reference    = $request->reference;
        $city->provider_id  = $request->provider_id;
        $city->save();
        return response()->json(["Success" => "saved successfuly"]);
    }

    public function delete($id)
    {
        Cities::find($id)->delete();
        return redirect()->route('dashboard.cities.index')->with('success',trans('city.deleted'));
    }
}
