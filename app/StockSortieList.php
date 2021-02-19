<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockSortieList extends Model
{
    protected $guarded  = ['id'];
    protected $table    = 'stock_sortie_list';

    public function product(){
        return $this->belongsTo('\App\Products', 'productID');
    }

    public function city(){
        return $this->belongsTo('\App\Cities', 'cityID');
    }
}
