<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create(['item_name' => 'Item A']);
        Item::create(['item_name' => 'Item B']);
        Item::create(['item_name' => 'Item C']);
    }
}
