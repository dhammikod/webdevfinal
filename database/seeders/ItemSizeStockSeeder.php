<?php

namespace Database\Seeders;

use App\Models\item_size_stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSizeStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        item_size_stock::create([
            'size' => 'M',
            'stock' => 5,
            'id_item' => 1,
        ]);
    }
}
