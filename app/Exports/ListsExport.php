<?php

namespace App\Exports;

use App\Lists;
use Maatwebsite\Excel\Concerns\FromCollection;

class ListsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lists::all();
    }
}
