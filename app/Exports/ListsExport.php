<?php

namespace App\Exports;

use App\Lists;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ListsExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'name',
            'adress',
            'note',
            'phone',
            'source',
            'provider_id',
            'employee_id',
            'handler',
            'city_id',
            'laivraison',
            'cancel_reason',
            'history',
            'product',
            'city',
            'quantity',
            'price',
            'status',
            'unanswered_at',
            'accepted_at',
            'verified_at',
            'delivered_at',
            'deleted_at',
            'canceled_at',
            'duplicated_at',
            'checked_at',
            'recall_at',
        ];
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lists::all();
    }
}
