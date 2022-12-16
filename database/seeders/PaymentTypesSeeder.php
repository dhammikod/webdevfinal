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
        Payment_types::create(
            [
                'payment_type' => 'BCA Mobile',
                'store_acc_number' => "(+52) 123123-1239",
                'acc_name' => "Edward Wijaya",
                'qr_code' => 'qr'
            ]
        );
        
        Payment_types::create(
            [
                'payment_type' => 'OVO Payment',
                'store_acc_number' => "(+52) 123123-1239",
                'acc_name' => "Edward Wijaya",
                'qr_code' => 'qr'
            ]
        );

        Payment_types::create(
            [
                'payment_type' => 'Go-Pay',
                'store_acc_number' => "(+52) 123123-1239",
                'acc_name' => "Edward Wijaya",
                'qr_code' => 'qr'
            ]
        );

    }
}
