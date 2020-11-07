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


    public function scopeCanceled($query){
        return  $query->where('status', 'canceled');
    }

    public function scopeUnanswered($query){
        return  $query->where('status', 'unanswered');
    }

    public function scopeRecall($query){
        return  $query->where('status', 'recall');
    }

    public function scopeDelivred($query){
        return  $query->where('status', 'delivred');
    }







}
