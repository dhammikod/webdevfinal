<?php

namespace Database\Seeders;

use App\Models\order;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create('en_US');
        order::create([
            'user_id' => 1,
            "order_date" => $faker->dateTime(),
            "ship_date" => $faker->dateTime(),
            'postal_code' => 90171,
            'shipment_address' => "WP 4 no 789 citrasky",
            'contact' => "(+62) 082236697711",
            'city' => "surabaya",
            'notes' => "rumah nya di atas langit",
            'proof_of_payment' => "shopee cod~~~",
            'status' => "ongoing"
        ]);

        order::create([
            'user_id' => 1,
            "order_date" => $faker->dateTime(),
            "ship_date" => $faker->dateTime(),
            'postal_code' => 90171,
            'shipment_address' => "WP 4 no 789 citrasky",
            'contact' => "(+62) 082236697711",
            'city' => "surabaya",
            'notes' => "rumah nya di atas langit",
            'proof_of_payment' => "shopee cod~~~",
            'status' => "pending"
        ]);

        order::create([
            'user_id' => 1,
            "order_date" => $faker->dateTime(),
            "ship_date" => $faker->dateTime(),
            'postal_code' => 90171,
            'shipment_address' => "WP 4 no 789 citrasky",
            'contact' => "(+62) 082236697711",
            'city' => "surabaya",
            'notes' => "rumah nya di atas langit",
            'proof_of_payment' => "shopee cod~~~",
            'status' => "completed"
        ]);
    }
}
