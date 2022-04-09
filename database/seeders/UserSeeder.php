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
                'first_name'    => 'Carlos',
                'last_name'     => 'Santos',
                'email'         => 'karscx@gmail.com',
                'image'         => null,
                'image_name'    => null,
                'image_path'    => null,
                'password'      => Hash::make('qweqweqwe'),
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'role_id'       => 2,
                'username'      => 'csantos',
                'first_name'    => 'Carlos',
                'last_name'     => 'Santos',
                'image'         => null,
                'image_name'    => null,
                'image_path'    => null,
                'email'         => 'csantos@digbang.com',
                'password'      => Hash::make('123456'),
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'role_id'       => 2,
                'username'      => 'ebattaglia',
                'first_name'    => 'Ezequiel',
                'last_name'     => 'Battaglia',
                'image'         => null,
                'image_name'    => null,
                'image_path'    => null,
                'email'         => 'ebattaglia@digbang.com',
                'password'      => Hash::make('123456'),
                'created_at'    => now(),
                'updated_at'    => now()
            ]
        ]);
    }
}
