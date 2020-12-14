<?php

namespace App\Helpers;

use App\Cities;
use App\Provider;

class CitiesHelper{

    public static function store($request){
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

        $city = new Cities();
        self::fillData($city, $request);

        return response()->json(["Success" => "saved successfuly"]);
    }

    public static function update($request, $id){
        $city = Cities::find($id);
        self::fillData($city, $request);
        return response()->json(["Success" => "saved successfuly"]);
    }

    public static function fillData($city, $request){
        $city->name         = $request->name;
        $city->reference    = $request->reference;
        $city->provider_id  = $request->provider_id;
        $city->save();
    }

    public static function delete($id){
        Cities::find($id)->delete();
        return redirect()->route('dashboard.cities.index')->with('success',trans('city.deleted'));
    }
}