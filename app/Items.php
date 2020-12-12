<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    protected $guarded = ['id'];
    
    public function product(){
        return  $this->belongsTo('App\Products', 'product_id')->withDefault(['name' => 'N-A']);
    }

<<<<<<< HEAD

   
}
=======
    public function list(){
        return  $this->belongsTo('App\Lists', 'list_id')->withDefault(['name' => 'N-A']);
    }

    public function delivredList(){
        return $this->hasMany('App\Lists', 'id')->where('delivred_at', '<>', NULL);
    }
}
>>>>>>> a6d3caa558e653b7589086640c5c4dda906ba5e0
