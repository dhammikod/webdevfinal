<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ItemSeeder::class,
            PaymentTypesSeeder::class,
            FeedbackSeeder::class,
            ItemPictureSeeder::class,
            ItemSizeStockSeeder::class,
            ItemRequestSeeder::class,
            ShippingAddressSeeder::class,
            OrderSeeder::class,
            DetilOrderSeeder::class,
            WishlistSeeder::class,
            ShoppingCartSeeder::class,
            // MemberSeeder::class
        ]);
    }
}
