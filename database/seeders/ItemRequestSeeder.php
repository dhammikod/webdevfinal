<?php

namespace Database\Seeders;

use App\Models\item_request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        item_request::create([
            'user_id' => 1,
            'request_picture' => "gambarnya di sebelah",
            'description' => "lorem ipsum dolor siamet",
            'status' => false,
            'title' => "cincin nikah"
        ]);
    }
}
