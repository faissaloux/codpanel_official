<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryEntree extends Model
{
    protected $guarded  = ['id'];
    protected $table    = 'history_entree';

    public function product(){
        return $this->belongsTo('App\Products', 'productID');
    }
}
