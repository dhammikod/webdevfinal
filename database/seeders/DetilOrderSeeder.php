<?php

namespace Database\Seeders;

use App\Models\detil_order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DetilOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create('en_US');
        detil_order::create([
            'id_order' => 1,
            'id_stocksize' => 1,
            'transaction_time' => $faker->dateTime(),
            'price_bought' => 10000,
            'total_items' => 5,
            'total_price' => 50000,
        ]);
    }
}
