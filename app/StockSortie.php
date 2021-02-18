<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockSortie extends Model
{
    protected $guarded  = ['id'];
    protected $table    = 'stock_sortie';

    public function product(){
        return $this->belongsTo('\App\Products', 'productID');
    }

    public function ListQuantities(){
        return $this->HasMany('\App\StockSortieList', 'sortie_list_id');
    }
}
