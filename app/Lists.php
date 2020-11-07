<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    public function provider(){
        return  $this->belongsTo('App\User', 'provider_id')->withDefault(['name' => 'N-A']);
    }

    public function employee(){
        return  $this->belongsTo('App\User', 'employee_id')->withDefault(['name' => 'N-A']);
    }

    public function items(){
        return  $this->hasMany('App\Items', 'list_id');
    }

    public function product(){
        return  $this->belongsTo('App\Items', 'list_id')->withDefault(['name' => 'N-A']);
    }
}
