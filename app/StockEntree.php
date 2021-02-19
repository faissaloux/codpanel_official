<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockEntree extends Model
{
    protected $table = 'stock_entree';

    public function product(){
        return $this->belongsTo('\App\Products', 'productID');
   }
}
