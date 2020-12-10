<?php

namespace App\Http\Controllers;
use App\Lists;
use App\Helpers\ListsHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvidersController extends Controller
{


    public $listingView = 'provider.elements.listing-table';
    public $listDetails = 'provider.elements.list_details';

    
    public function index()
    {
        $lists = ListsHelper::list_relatives('provider')[0];
        return view('provider.listing', compact('lists'));
    }


 
  
}