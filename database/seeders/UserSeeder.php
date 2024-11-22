<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create(
            [
                'name'     => 'Mominul Islam',
                'email'    => 'hello@mominul.me',
                'role'     => 'admin',
                'password' => bcrypt('password'),
            ]

        );

        User::factory()->create(
            [
                'name'     => 'Mahin Islam',
                'email'    => 'mahinislam09@gmail.com',
                'role'     => 'user',
                'password' => bcrypt('password'),
            ]

        );

//        User::factory(10)->create();


    }
}
