<?php

namespace App;

use \App\Base;
use Carbon\Carbon;

class Cities extends Base
{

    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo('\App\User', 'provider_id')->withDefault(['name' => 'N-A']);
    }

    public function provider(){
        return $this->belongsTo('\App\Provider', 'provider_id')->withDefault(['name' => 'N-A']);
    }

    public function scopeLastMonth($query)
    {
        return $query->whereMonth('created_at', Carbon::now()->subMonth()->month)
                     ->whereYear('created_at', Carbon::now()->subMonth()->year)
                     ->count();
    }

    public function scopeCurrentMonth($query)
    {
        return $query->whereMonth('created_at', Carbon::now()->month)
                     ->whereYear('created_at', Carbon::now()->year)
                     ->count();
    }

}