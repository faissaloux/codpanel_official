<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ProvidersController extends Controller
{
    public $listingView = 'provider.elements.listing-table';
    public $listDetails = 'provider.elements.list_details';
    public $listing     = 'provider.listing';
    public $filterView  = 'list.details';
}