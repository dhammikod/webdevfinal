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
        item_request::create(
            [
                'user_id' => 3,
                'request_picture' => "gambarnya di sebelah",
                'description' => "lorem ipsum dolor siamet",
                'status' => false,
                'title' => "cincin nikah"
            ]
        );

        item_request::create(
            [
                'user_id' => 2,
                'request_picture' => "pic",
                'description' => "mau sepatu yang balenciaga hitam putih",
                'status' => true,
                'title' => "SEPATUU"
            ]
        );

    }
}
