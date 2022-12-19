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
        item_size_stock::create(
            [
                'size' => 'Medium',
                'stock' => 5,
                'id_item' => 1,
            ]
        );
        
        item_size_stock::create(
            [
                'size' => '43',
                'stock' => 3,
                'id_item' => 2,
            ]
        );

        item_size_stock::create(
            [
                'size' => '44',
                'stock' => 1,
                'id_item' => 2,
            ]
        );
        item_size_stock::create(
            [
                'size' => '45',
                'stock' => 1,
                'id_item' => 2,
            ]
        );

        item_size_stock::create(
            [
                'size' => '40mm',
                'stock' => 1,
                'id_item' => 3,
            ]
        );

        item_size_stock::create(
            [
                'size' => '38',
                'stock' => 2,
                'id_item' => 4,
            ]
        );

        item_size_stock::create(
            [
                'size' => '39',
                'stock' => 3,
                'id_item' => 5,
            ]
        );

        item_size_stock::create(
            [
                'size' => '40',
                'stock' => 3,
                'id_item' => 5,
            ]
        );

        item_size_stock::create(
            [
                'size' => 'Small',
                'stock' => 3,
                'id_item' => 6,
            ]
        );

        item_size_stock::create(
            [
                'size' => 'Large',
                'stock' => 1,
                'id_item' => 6,
            ]
        );

        item_size_stock::create(
            [
                'size' => 'Extra Large',
                'stock' => 3,
                'id_item' => 6,
            ]
        );

        item_size_stock::create(
            [
                'size' => 'US 10,5',
                'stock' => 1,
                'id_item' => 7,
            ]
        );

        item_size_stock::create(
            [
                'size' => 'US 9,5',
                'stock' => 1,
                'id_item' => 8,
            ]
        );

        item_size_stock::create(
            [
                'size' => '1 size',
                'stock' => 1,
                'id_item' => 9,
            ]
        );

        item_size_stock::create(
            [
                'size' => 'M',
                'stock' => 1,
                'id_item' => 10,
            ]
        );

        item_size_stock::create(
            [
                'size' => '1 size',
                'stock' => 1,
                'id_item' => 11,
            ]
        );

        item_size_stock::create(
            [
                'size' => 'L',
                'stock' => 2,
                'id_item' => 12,
            ]
        );

        item_size_stock::create(
            [
                'size' => 'XL',
                'stock' => 2,
                'id_item' => 12,
            ]
        );
    }
}
