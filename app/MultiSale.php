<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiSale extends Model
{
    protected $table = 'multisale';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function product(){
        return $this->belongsTo('\App\Products','productID');
    }
    
    public function list(){
        return $this->belongsTo('\App\Lists','listID');
    }
}
