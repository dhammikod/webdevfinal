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
            'statusDelete' => false
        ]);

        Item::create([
            'nama' => 'Yeezy Adidas',
            'sold' => 10,
            'price' => 3500000,
            'description' => 'Shiny',
            'category' => 'Shoes',
            'statusDelete' => false
        ]);

        Item::create([
            'nama' => 'Rolex Gold',
            'sold' => 0,
            'price' => 1000000,
            'description' => 'ROLEXXX',
            'category' => 'Watch',
            'statusDelete' => false
        ]);

        Item::create([
            'nama' => 'Casio',
            'sold' => 4,
            'price' => 100000,
            'description' => 'casioo',
            'category' => 'Watch',
            'statusDelete' => false
        ]);

        Item::create([
            'nama' => 'Nike Vaporfly',
            'sold' => 1,
            'price' => 10000,
            'description' => 'nikee',
            'category' => 'Shoes',
            'statusDelete' => false
        ]);

        Item::create([
            'nama' => 'Kenzo Tee',
            'sold' => 2,
            'price' => 300000,
            'description' => 'Kenzio',
            'category' => 'Clothes',
            'statusDelete' => false
        ]);
    }
}
