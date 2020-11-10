<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function product(){
        return  $this->belongsTo('App\Products', 'product_id')->withDefault(['name' => 'N-A']);
    }
}
