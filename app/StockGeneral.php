<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockGeneral extends Model
{
    protected $table    = 'stock_general';
    protected $guarded  = ['id', 'created_at', 'updated_at'];
}
