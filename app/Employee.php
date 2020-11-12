<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = ['id'];

    public function color(){
        return (new \App\System\Helper())->random_color();
    }
}
