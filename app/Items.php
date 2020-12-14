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
        return  $this->belongsTo('App\Lists', 'list_id');
    }

    public function delivredList(){
        return $this->belongsTo('App\Lists', 'list_id')->where('delivred_at', '<>', NULL);
    }
}
>>>>>>> 031597cbca1e1050bea287669f1fd7e5d4a61ece
