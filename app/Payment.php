<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

    public function scopeCurrentMonth($query)
    {
        return $query->where('paid', 1)->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->select(   \DB::raw('MONTH(`created_at`) as `created_at`'),
                                \DB::raw('count(*) as `orders`'),
                                \DB::raw('sum(`amount`) as `amount`')
                            )
                    ->groupBy(\DB::raw('MONTH(`created_at`)'))
                    ->first();
    }
    
    public function scopeLastMonth($query)
    {
        return $query->where('paid', 1)->whereMonth('created_at', Carbon::now()->subMonth()->month)
                    ->whereYear('created_at', Carbon::now()->subMonth()->year)
                    ->select(   \DB::raw('MONTH(`created_at`) as `created_at`'),
                                \DB::raw('count(*) as `orders`'),
                                \DB::raw('sum(`amount`) as `amount`')
                            )
                    ->groupBy(\DB::raw('MONTH(`created_at`)'))
                    ->first();
    }

    public function scopeStats($query)
    {
        return $query->where('paid', 1)->select(    \DB::raw('DATE(`created_at`) as `created_at`'),
                                                    \DB::raw('count(*) as `orders`'),
                                                    \DB::raw('sum(`amount`) as `amount`')
                                                )
                                            ->groupBy(\DB::raw('DATE(`created_at`)'))
                                            ->orderBy('created_at', 'DESC')
                                            ->get();
    }
}
