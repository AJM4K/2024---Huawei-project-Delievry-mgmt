<?php

namespace Database\Seeders;

use App\Models\MA;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MA::create(['ma_number' => 'MA001', 'po_id' => 1]);
        MA::create(['ma_number' => 'MA002', 'po_id' => 2]);
        MA::create(['ma_number' => 'MA003', 'po_id' => 3]);
    }
}
