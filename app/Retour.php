<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retour extends Model
{
    protected $table = 'stock_retour';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
        
    public function product(){
        return $this->belongsTo('\App\Products', 'productID');
    }

    public function city(){
        return $this->belongsTo('\App\Cities', 'cityID');
    }  
}
