<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function scopeCurrentProvider($query){
        return $query->where('provider_id', Auth::user()->id);
    }

    public function scopeCurrentEmployee($query){
        return $query->where('employee_id', Auth::user()->id);
    }

    public function scopeEmployees($query){
        return $query->where('handler', 'employee');
    }

    public function scopeProviders($query){
        return $query->where('handler', 'provider');
    }

    public function scopeNew($query){
        return $query->where('status', 'new');
    }

    public function scopeConfirmed($query){
        return $query->where('status', 'confirmed');
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
