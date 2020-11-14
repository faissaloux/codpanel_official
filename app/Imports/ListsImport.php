<?php

namespace App\Imports;

use App\Lists;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ListsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lists([
            'name' => $row['name'],
            'adress' => $row['adress'],
            'note' => $row['note'],
            'phone' => $row['phone'],
            'source' => $row['source'],
            'provider_id' => $row['provider_id'],
            'employee_id' => $row['employee_id'],
            'handler' => $row['handler'],
            'city_id' => $row['city_id'],
            'laivraison' => $row['laivraison'],
            'cancel_reason' => $row['cancel_reason'],
            'history' => $row['history'],
            'product' => $row['product'],
            'city' => $row['city'],
            'quantity' => $row['quantity'],
            'price' => $row['price'],
            'status' => $row['status'],
            'unanswered_at' => $row['unanswered_at'],
            'accepted_at' => $row['accepted_at'],
            'verified_at' => $row['verified_at'],
            'delivered_at' => $row['delivered_at'],
            'deleted_at' => $row['deleted_at'],
            'canceled_at' => $row['canceled_at'],
            'duplicated_at' => $row['duplicated_at'],
            'checked_at' => $row['checked_at'],
            'recall_at' => $row['recall_at']
        ]);
    }
}
