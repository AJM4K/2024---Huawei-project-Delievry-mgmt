<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\MA;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemMASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ma1 = MA::find(1);
        $ma2 = MA::find(2);

        $item1 = Item::find(1);
        $item2 = Item::find(2);

        $ma1->items()->attach($item1->id, ['quantity' => 10]);
        $ma1->items()->attach($item2->id, ['quantity' => 20]);

        $ma2->items()->attach($item1->id, ['quantity' => 5]);
    }
}
