<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
{
    const ACCESS_RIGHTS = [
        'orders',
        'auto-orders',
        'payments',
        'customers',
        'products',
        'pages',
        'reports',
        'settings',
        'discounts',
    ];

    protected $table = 'staffs';

    public function domain_name(): BelongsTo
    {
        return $this->belongsTo(DomainName::class);
    }
}
