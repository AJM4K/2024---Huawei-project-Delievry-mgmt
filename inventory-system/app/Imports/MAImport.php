<?php

namespace App\Imports;

use App\Models\Item;
use App\Models\MA;
use App\Models\PO;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


class MAImport implements ToCollection, WithHeadingRow
{

    //  public $data = [];
    public $po_number = '';
    public $ma_number = '';
    public $getHeader = true;
    // Property to hold imported data

    public function collection(Collection $rows)
    {
        // Skip header row
        // HeadingRowFormatter::default('none');

        foreach ($rows as $row) {
            // Store each row's data in the $data property using named columns
            // $this->data[] = [
            //     'item_id'   => $row['item_id'],   // Use named column
            //     'item_name' => $row['item_name'], // Use named column
            //     'ma_id'     => $row['ma_id'],     // Use named column
            //     'quantity'  => $row['quantity'],  // Use named column
            // ];

            $this->po_number = $row['po_number'];
            $this->ma_number = $row['ma_number'];
            $this->add_po($this->po_number);
            $this->add_ma($this->ma_number, $this->po_number);
            $item_number = $row['item_number'];
            $item_description = $row['item_description'];
            $this->add_item($item_number, $item_description);
            $quantity = $row['quantity'];
            $serial_number = $row['serial_number'];
            $comments = $row['comments'];
            $this->add_item_ma($this->ma_number, $item_number, $quantity);

        }

        return [];
    }

    public function add_po($po_number_arg)
    {
        $isExits = PO::where('po_number', '=', $po_number_arg)->exists();
        if (!$isExits) {
            $post = new PO();
            $post->po_number = $po_number_arg;
            $post->save();
        }
    }

    public function add_ma($ma_number_arg, $po_number_arg)
    {

        $isMAExists = MA::where('ma_number', '=', $ma_number_arg)->exists();
        
        if (!$isMAExists) {
            $post = new MA();
            $post->ma_number = $ma_number_arg;
            $post->po_id = $po_number_arg;
            $post->save();
        }
    }
    public function add_item($item_number_arg, $item_description_arg)
    {

        $isItemExists = Item::where('item_number', '=', $item_number_arg)->exists();
        if (!$isItemExists) {
            $post = new Item();
            $post->item_number = $item_number_arg;
            $post->description = $item_description_arg;
            $post->save();
        }
    }

    public function add_item_ma($ma_number_arg, $item_number_arg, $quantity_arg)
    {

        DB::table('item_m_a
        ')->insert([
            'ma_id' => $ma_number_arg,
            'item_id' => $item_number_arg,
            'quantity' => $quantity_arg,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
