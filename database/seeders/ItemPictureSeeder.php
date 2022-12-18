<?php

namespace Database\Seeders;

use App\Models\item_picture;
use Illuminate\Database\Seeder;

class ItemPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        item_picture::create([
            'id_item' => 1,
            'picture' => 'item_picture/polo1.jpg',
        ]);

        item_picture::create([
            'id_item' => 1,
            'picture' => 'item_picture/polo2.jpeg',
        ]);

        item_picture::create([
            'id_item' => 1,
            'picture' => 'item_picture/polo3.jpeg',
        ]);

        item_picture::create([
            'id_item' => 2,
            'picture' => 'item_picture/yeezy1.jpeg',
        ]);

        item_picture::create([
            'id_item' => 3,
            'picture' => 'item_picture/rolex1.jpeg',
        ]);

        item_picture::create([
            'id_item' => 4,
            'picture' => 'item_picture/casio1.jpg',
        ]);

        item_picture::create([
            'id_item' => 5,
            'picture' => 'item_picture/nike1.webp',
        ]);

        item_picture::create([
            'id_item' => 6,
            'picture' => 'item_picture/kenzo1.webp',
        ]);
    }
}
