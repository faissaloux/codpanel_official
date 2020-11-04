<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingController extends Controller {
    

	public function __construct() {
        if(Auth::user()->role != 'admin'){
        	return response()->json([	'error'=> 'you are not allowed to do this' ]);
        }
    }


}
