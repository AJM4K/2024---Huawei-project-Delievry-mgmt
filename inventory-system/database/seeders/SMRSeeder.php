<?php

namespace Database\Seeders;

use App\Models\SMR;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SMRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SMR::create(['smr_number' => 'SMR001', 'po_id' => 1]);
        SMR::create(['smr_number' => 'SMR002', 'po_id' => 2]);
        SMR::create(['smr_number' => 'SMR003', 'po_id' => 3]);
    }
}
