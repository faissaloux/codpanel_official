<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistiquesController extends Controller
{
    public function cash(){
        return view('dashboard.statistiques.cash');
    }
}
