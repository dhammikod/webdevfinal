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

        item_picture::create([
            'id_item' => 7,
            'picture' => 'item_picture/YEEZY_DESERT_SAGE_1.jpg',
        ]);

        item_picture::create([
            'id_item' => 7,
            'picture' => 'item_picture/YEEZY_DESERT_SAGE_2.jpg',
        ]);

        item_picture::create([
            'id_item' => 7,
            'picture' => 'item_picture/YEEZY_DESERT_SAGE_3.jpg',
        ]);

        item_picture::create([
            'id_item' => 7,
            'picture' => 'item_picture/YEEZY_DESERT_SAGE_4.jpg',
        ]);

        item_picture::create([
            'id_item' => 8,
            'picture' => 'item_picture/AIR_JORDAN_SIGNAL_BLUE_1.jpg',
        ]);

        item_picture::create([
            'id_item' => 8,
            'picture' => 'item_picture/AIR_JORDAN_SIGNAL_BLUE_2.jpg',
        ]);

        item_picture::create([
            'id_item' => 9,
            'picture' => 'item_picture/ADLV_ASTRONAUT_BOY_1.jpg',
        ]);

        item_picture::create([
            'id_item' => 9,
            'picture' => 'item_picture/ADLV_ASTRONAUT_BOY_2.jpg',
        ]);

        item_picture::create([
            'id_item' => 9,
            'picture' => 'item_picture/ADLV_ASTRONAUT_BOY_3.jpg',
        ]);

        item_picture::create([
            'id_item' => 10,
            'picture' => 'item_picture/RICKY_IS_CLOWN_1.jpg',
        ]);

        item_picture::create([
            'id_item' => 10,
            'picture' => 'item_picture/RICKY_IS_CLOWN_2.jpg',
        ]);

        item_picture::create([
            'id_item' => 11,
            'picture' => 'item_picture/ADLV_FIREWORKS_1.jpg',
        ]);

        item_picture::create([
            'id_item' => 11,
            'picture' => 'item_picture/ADLV_FIREWORKS_2.jpg',
        ]);

        item_picture::create([
            'id_item' => 11,
            'picture' => 'item_picture/ADLV_FIREWORKS_3.jpg',
        ]);

        item_picture::create([
            'id_item' => 12,
            'picture' => 'item_picture/RICKY_IS_CLOWN_BLUE_GALAXY_1.jpg',
        ]);

        item_picture::create([
            'id_item' => 12,
            'picture' => 'item_picture/RICKY_IS_CLOWN_BLUE_GALAXY_2.jpg',
        ]);
    }
}
