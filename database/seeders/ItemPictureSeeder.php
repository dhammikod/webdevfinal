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
            'picture' => 'picturenya 1',
        ]);

        item_picture::create([
            'id_item' => 1,
            'picture' => 'picturenya 2',
        ]);

        item_picture::create([
            'id_item' => 1,
            'picture' => 'picturenya 3',
        ]);

        item_picture::create([
            'id_item' => 2,
            'picture' => 'picturenya2 1',
        ]);
    }
}
