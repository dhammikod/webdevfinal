<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feedback::create(
            [
                'user_id' => 3,
                'feedback' => "tokonya memiliki sangat banyak produk dan bagus-bagus",
                'status' => true,
                'title' => '5 bintang'
            ]
        );
        Feedback::create(
            [
                'user_id' => 3,
                'feedback' => "Kalau bisa tokonya dikasih fitur diskon ya :)",
                'status' => false,
                'title' => 'Fitur Tambahan'
            ]
        );
    }
}
