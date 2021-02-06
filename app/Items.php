<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    protected $guarded = ['id'];
    
    public function product(){
        return  $this->belongsTo('App\Products', 'product_id')->withDefault(['name' => 'N-A']);
    }

    public function delivredList(){
        return $this->belongsTo('App\Lists', 'list_id')->where('delivred_at', '<>', NULL);
    }
   
    public function lists(){
        return $this->belongsTo('App\Lists', 'list_id');
    }
}