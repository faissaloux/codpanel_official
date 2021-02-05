<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $guarded = ['id'];
    
    public function items(){
        return $this->hasMany('App\Items', 'product_id');
    }

    public function color(){
        return (new \App\System\Helper())->random_color();
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
