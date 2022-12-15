<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Hagen',
            'last_name' => 'Hagen',
            'email' => 'admin1@localhost',
            'password' => Hash::make("password123"),
            'status' => 'admin',
        ]);
        User::create([
            'first_name' => 'dham',
            'last_name' => 'miko',
            'email' => 'admin2@localhost',
            'password' => Hash::make("password123"),
            'status' => 'admin',
        ]);
        User::create([
            'first_name' => 'tes',
            'last_name' => 'user',
            'email' => 'user@localhost',
            'password' => Hash::make("password123"),
            'status' => 'user',
        ]);
    }
}
