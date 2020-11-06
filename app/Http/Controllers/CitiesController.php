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
            'provider' => 'required|min:3',
        ];
  
        $messages = [
            'email.required'    => trans("email.required"),
            'email.email'       => trans("email.unique"),
            'email.unique'      => trans("name.required"),
            'password.required' => trans("password.required"),
            'password.min'      => trans("password.min"),
            'name.required'     => trans("name.required"),
            'phone.required'    => trans("phone.required"),
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
        $city->user_id    = $request->provider;
        $city->save();
        return redirect()->route('dashboard.cities.index')->with('success',trans('city.updated'));
    }

    public function delete($id)
    {
        $city = Cities::find($id);
        $city->delete();
        return redirect()->route('dashboard.cities.index')->with('success',trans('city.deleted'));
    }
}
