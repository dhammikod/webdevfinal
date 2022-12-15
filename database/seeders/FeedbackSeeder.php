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
        Feedback::create([
            'user_id' => 1,
            'feedback' => "tokonya memiliki sangat banyak produk dan bagus-bagus",
            'status' => true,
            'title' => '5 bintang',
        ]);
    }
}
