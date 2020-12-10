<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DomainName extends Model
{
    protected $table = 'domain_names';

    protected $fillable = [
        'name', 'expired_at'
    ];

    public function staffs(): HasMany
    {
        return $this->hasMany(Staff::class);
    }
}
