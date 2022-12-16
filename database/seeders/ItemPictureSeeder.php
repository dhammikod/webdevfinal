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
            'picture' => 'polo1',
        ]);

        item_picture::create([
            'id_item' => 1,
            'picture' => 'polo2',
        ]);

        item_picture::create([
            'id_item' => 1,
            'picture' => 'polo3',
        ]);

        item_picture::create([
            'id_item' => 2,
            'picture' => 'yeezy1',
        ]);

        item_picture::create([
            'id_item' => 3,
            'picture' => 'rolex1',
        ]);

        item_picture::create([
            'id_item' => 4,
            'picture' => 'casio1',
        ]);

        item_picture::create([
            'id_item' => 5,
            'picture' => 'nike1',
        ]);

        item_picture::create([
            'id_item' => 6,
            'picture' => 'kenzo1',
        ]);
    }
}
