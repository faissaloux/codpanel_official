<?php

namespace App\Http\Controllers;

use App\Cities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = Cities::orderby('id','desc')->paginate(10);
        return view('dashboard.cities.index',compact('cities'));
    }

    public function create()
    {
        return view('dashboard.cities.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'     => 'required|min:3',
            'reference'   => 'required|min:4',
            'provider_id' => 'required|min:1',
        ];
  
        $messages = [
            'name.required'     => trans("name.required"),
            'reference.required'     => trans("reference.required"),
            'provider_id.required'    => trans("provider_id.required"),
        ];
        
        $request->validate($rules,$messages);

        $city           = new Cities();
        $city->name     = $request->name;
        $city->reference    = $request->reference;
        $city->provider_id    = $request->provider_id;
        $city->save();
        return redirect()->route('dashboard.cities.index')->with('success', trans('city.created'));
    }

    public function edit($id)
    {
        $content = Cities::find($id);
        return view ('dashboard.cities.edit',compact('content'));
    }

    public function update(Request $request, $id)
    {
        $city = Cities::find($id);
        $city->name     = $request->name;
        $city->reference    = $request->reference;
        $city->save();
        return redirect()->route('dashboard.cities.index')->with('success',trans('city.updated'));
    }

    public function delete($id)
    {
        $city = Cities::find($id);
        $city->delete();
        return redirect()->route('dashboard.cities.index')->with('failed',trans('city.deleted'));
    }
}
