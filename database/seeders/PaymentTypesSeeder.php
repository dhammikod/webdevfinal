<?php

namespace Database\Seeders;

use App\Models\Payment_types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment_types::create([
            'payment_type' => 'OVO',
            'store_acc_number' => "(+52) 123123-1239",
            'acc_name' => "hagen",
        ]);
    }
}
