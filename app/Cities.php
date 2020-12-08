<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{

    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo('\App\User', 'provider_id')->withDefault(['name' => 'N-A']);
    }

    public function provider(){
        return $this->belongsTo('\App\Provider', 'provider_id')->withDefault(['name' => 'N-A']);
    }
}
