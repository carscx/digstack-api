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
        User::insert([
            [
                'role_id'       => 1,
                'username'      => 'admin',
                'email'         => 'admin@restapi.com',
                'password'      => Hash::make('123456'),
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'role_id'       => 2,
                'username'      => 'user1',
                'email'         => 'user1@restapi.com',
                'password'      => Hash::make('123456'),
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'role_id'       => 2,
                'username'      => 'user2',
                'email'         => 'user2@restapi.com',
                'password'      => Hash::make('123456'),
                'created_at'    => now(),
                'updated_at'    => now()
            ]
        ]);
    }
}
