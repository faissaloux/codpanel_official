<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Helpers\ListsHelper;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $lists = ListsHelper::list_relatives(\System::auth_type())[0];
        return view($this->listing, compact('lists'));
    }

    public function listing(Request $request)
    {
        $lists = ListsHelper::load($request);
        return response()->view( $this->listingView , compact('lists'))->setStatusCode(200);
    }

    public function statue(Request $request , $id)
    {
        $message = ListsHelper::setStatus($request,$id);
        return response()->json($message)->setStatusCode(200);
    }

    public function load($id)
    {
        $list = Lists::with("items")->find($id);
        return response()->view($this->listDetails, compact('list'))->setStatusCode(200);
    }

    
}