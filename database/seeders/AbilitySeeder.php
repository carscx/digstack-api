<?php

namespace Database\Seeders;

use App\Models\Ability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ability::insert([
            ['ability' => '*'],
            ['ability' => 'auth-*'],
            ['ability' => 'auth-logout'],
            ['ability' => 'auth-register'],
            ['ability' => 'user-*'],
            ['ability' => 'user-showall'],
            ['ability' => 'user-show'],
            ['ability' => 'user-store'],
            ['ability' => 'user-update'],
            ['ability' => 'user-destroy'],
            ['ability' => 'post-*'],
            ['ability' => 'post-showall'],
            ['ability' => 'post-show'],
            ['ability' => 'post-store'],
            ['ability' => 'post-update'],
            ['ability' => 'post-destroy'],
            ['ability' => 'comment-*'],
            ['ability' => 'comment-showall'],
            ['ability' => 'comment-show'],
            ['ability' => 'comment-store'],
            ['ability' => 'comment-update'],
            ['ability' => 'comment-destroy'],
        ]);
    }
}
