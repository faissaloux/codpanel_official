<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{

    public function scopeOrdered($query){
        return $query->orderby('id','desc');
    }


    
}