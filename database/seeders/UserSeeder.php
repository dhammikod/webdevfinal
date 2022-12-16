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
        User::create(
            [
                'name' => 'Hagen',
                'email' => 'h@gmail.com',
                'password' => Hash::make("password123"),
                'status' => 'admin',
                'profile_picture' => 'noimgeplaceholder'

            ]
        );

        User::create(
            [
                'name' => 'dhammiko',
                'email' => 'd@gmail.com',
                'password' => Hash::make("password123"),
                'status' => 'admin',
                'profile_picture' => 'noimgeplaceholder'
            ]
        );

        User::create(
            [
                'name' => 'tesuser1',
                'email' => '1@gmail.com',
                'password' => Hash::make("password123"),
                'status' => 'user',
            ]
        );

        User::create(
            [
                'name' => 'tesuser2',
                'email' => '2@gmail.com',
                'password' => Hash::make("password123"),
                'status' => 'user',
            ]
        );

        User::create(
            [
                'name' => 'tesuser3',
                'email' => '3@gmail.com',
                'password' => Hash::make("password123"),
                'status' => 'user',
            ]
        );
    }
}
