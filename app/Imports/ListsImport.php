<?php

namespace App\Imports;

use App\Lists;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ListsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $column
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $column)
    {
        return new Lists([
            'name' => $column['name'],
            'adress' => $column['adress'],
            'note' => $column['note'],
            'phone' => $column['phone'],
            'source' => $column['source'],
            'provider_id' => $column['provider_id'],
            'employee_id' => $column['employee_id'],
            'handler' => $column['handler'],
            'city_id' => $column['city_id'],
            'laivraison' => $column['laivraison'],
            'cancel_reason' => $column['cancel_reason'],
            'history' => $column['history'],
            'product' => $column['product'],
            'city' => $column['city'],
            'quantity' => $column['quantity'],
            'price' => $column['price'],
            'status' => $column['status'],
            'unanswered_at' => Date::excelToDateTimeObject($column['unanswered_at']),
            'accepted_at' => Date::excelToDateTimeObject($column['accepted_at']),
            'verified_at' => Date::excelToDateTimeObject($column['verified_at']),
            'delivred_at' => Date::excelToDateTimeObject($column['delivred_at']),
            'deleted_at' => Date::excelToDateTimeObject($column['deleted_at']),
            'canceled_at' => Date::excelToDateTimeObject($column['canceled_at']),
            'duplicated_at' => Date::excelToDateTimeObject($column['duplicated_at']),
            'checked_at' => Date::excelToDateTimeObject($column['checked_at']),
            'recall_at' => Date::excelToDateTimeObject($column['recall_at'])
        ]);
    }
}
