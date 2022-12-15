<?php

namespace Database\Seeders;

use App\Models\shipping_address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        shipping_address::create([
            'user_id' => 1,
            'postal_code' => 90171,
            'shipment_address' => "WP 4 no 789 citrasky",
            'contact' => "(+62) 082236697711",
            'city' => "surabaya",
            'notes' => "rumah nya di atas langit"
        ]);
    }
}
