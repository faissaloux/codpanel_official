<?php

namespace App\Imports;

use App\Lists;
use Maatwebsite\Excel\Concerns\ToModel;

class ListsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lists([
            'name'      => $row[0],
            'adress'    => $row[1],
            'note'      => $row[2],
            'phone'     => $row[3],
            'sourcer'   => $row[4]
        ]);
    }
}
