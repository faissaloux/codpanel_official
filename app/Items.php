<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function product(){
        return  $this->hasOne('App\Products');
    }
}
