<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::insert([
            [
                'user_id' => 1,
                'post_id' => 1,
                'message' => 'Test 1',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 3,
                'post_id' => 1,
                'message' => 'Test 2',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 3,
                'post_id' => 2,
                'message' => 'Test 3',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 1,
                'post_id' => 2,
                'message' => 'Test 4',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 2,
                'post_id' => 2,
                'message' => 'Test 5',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 2,
                'post_id' => 3,
                'message' => 'Test 6',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 1,
                'post_id' => 3,
                'message' => 'Test 7',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 1,
                'post_id' => 3,
                'message' => 'Test 8',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 2,
                'post_id' => 4,
                'message' => 'Test 9',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 3,
                'post_id' => 4,
                'message' => 'Test 10',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 3,
                'post_id' => 5,
                'message' => 'Test 11',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 2,
                'post_id' => 5,
                'message' => 'Test 12',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 1,
                'post_id' => 5,
                'message' => 'Test 13',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
        ]);
    }
}
