<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'nama' => 'Baju polo',
            'sold' => 0,
            'price' => 100000,
            'description' => 'Baju yang dapat menunjukkan otot kekar/tubuh langsing anda',
            'category' => 'Clothes',
        ]);

        Item::create([
            'nama' => 'Yeezy Adidas',
            'sold' => 10,
            'price' => 3500000,
            'description' => 'Shiny',
            'category' => 'Shoes',
        ]);

        Item::create([
            'nama' => 'Rolex Gold',
            'sold' => 0,
            'price' => 1000000,
            'description' => 'ROLEXXX',
            'category' => 'Watch',
        ]);
    }
}
