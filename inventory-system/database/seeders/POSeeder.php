<?php

namespace Database\Seeders;

use App\Models\PO;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class POSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PO::create(['po_number' => 'PO001', 'warehouse_id' => 1]);
        PO::create(['po_number' => 'PO002', 'warehouse_id' => 2]);
        PO::create(['po_number' => 'PO003', 'warehouse_id' => 3]);
    }
}
