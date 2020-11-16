<?php

namespace App\Exports;

use App\Lists;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ListsExport implements FromCollection, WithHeadings, WithStyles
{

    public function headings(): array
    {
        return [
            'id',
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
            'delivred_at',
            'deleted_at',
            'canceled_at',
            'duplicated_at',
            'checked_at',
            'recall_at',
            'created_at',
            'updated_at'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]]
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
