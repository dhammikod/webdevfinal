<?php

namespace Database\Seeders;

use App\Models\wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        wishlist::create([
            'user_id' => 1,
            'item_id' => 1,
        ]);
    }
}
