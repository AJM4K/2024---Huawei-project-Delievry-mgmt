<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class MAImport implements ToCollection, WithHeadingRow
{
    public $data = []; // Property to hold imported data

    public function collection(Collection $rows)
    {
        // Skip header row
        foreach ($rows as $row) {
            // Store each row's data in the $data property using named columns
            $this->data[] = [
                'item_id'   => $row['item_id'],   // Use named column
                'item_name' => $row['item_name'], // Use named column
                'ma_id'     => $row['ma_id'],     // Use named column
                'quantity'  => $row['quantity'],  // Use named column
            ];
            // todo: here we should write the logic to add to the tables MA or Item or Item_MA pivot table 
        }
    }
}
