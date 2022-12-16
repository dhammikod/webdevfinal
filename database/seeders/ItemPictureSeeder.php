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
            'picture' => 'polo1.jpg',
        ]);

        item_picture::create([
            'id_item' => 1,
            'picture' => 'polo2.jpeg',
        ]);

        item_picture::create([
            'id_item' => 1,
            'picture' => 'polo3.jpeg',
        ]);

        item_picture::create([
            'id_item' => 2,
            'picture' => 'yeezy1.jpeg',
        ]);

        item_picture::create([
            'id_item' => 3,
            'picture' => 'rolex1.jpeg',
        ]);

        item_picture::create([
            'id_item' => 4,
            'picture' => 'casio1.jpg',
        ]);

        item_picture::create([
            'id_item' => 5,
            'picture' => 'nike1.webp',
        ]);

        item_picture::create([
            'id_item' => 6,
            'picture' => 'kenzo1.webp',
        ]);
    }
}
