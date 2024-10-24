<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\SMR;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSMRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $smr1 = SMR::find(1);
        $smr2 = SMR::find(2);

        $item1 = Item::find(1);
        $item2 = Item::find(2);

        $smr1->items()->attach($item1->id, ['quantity' => 5, 'received' => true]);
        $smr1->items()->attach($item2->id, ['quantity' => 15, 'received' => false]);

        $smr2->items()->attach($item1->id, ['quantity' => 8, 'received' => true]);
    
    }
}
