<?php

namespace Database\Seeders;

use App\Models\RoleAbility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleAbility::insert([
            ['role_id' => 1, 'ability_id' => 1],
            ['role_id' => 2, 'ability_id' => 3],
            ['role_id' => 2, 'ability_id' => 7],
            ['role_id' => 2, 'ability_id' => 9],
            ['role_id' => 2, 'ability_id' => 11],
            ['role_id' => 2, 'ability_id' => 17],
        ]);
    }
}
