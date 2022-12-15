<?php

namespace Database\Seeders;

use App\Models\shopping_cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoppingCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        shopping_cart::create([
            'user_id' => 1,
            'item_id' => 1,
            'jumlah' => 2,
        ]);
    }
}
