<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';

    public function domain_name()
    {
        return $this->belongsTo(DomainName::class);
    }
}
