<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert([
            [
                'user_id' => 1,
                'title' => 'Web Programming',
                'slug' => 'web-programming',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Magna ac placerat vestibulum lectus. Massa ultricies mi quis hendrerit dolor magna. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper. Nunc scelerisque viverra mauris in aliquam sem fringilla ut. Imperdiet nulla malesuada pellentesque elit. Accumsan in nisl nisi scelerisque eu. Pharetra convallis posuere morbi leo urna molestie at. Lacus viverra vitae congue eu consequat ac felis donec et. Risus in hendrerit gravida rutrum quisque. Consectetur purus ut faucibus pulvinar elementum integer enim. Nisi porta lorem mollis aliquam. Curabitur gravida arcu ac tortor dignissim convallis aenean et tortor. Placerat vestibulum lectus mauris ultrices eros in. Integer quis auctor elit sed vulputate mi sit amet. Lectus sit amet est placerat in egestas erat imperdiet sed',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 2,
                'title' => 'Backend Developer',
                'slug' => 'backend-developer',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor orci dapibus. Diam sit amet nisl suscipit adipiscing bibendum est ultricies integer. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Arcu ac tortor dignissim convallis aenean. Ut faucibus pulvinar elementum integer enim neque. Dolor sit amet consectetur adipiscing elit. Nisi porta lorem mollis aliquam. Sed faucibus turpis in eu mi bibendum. Elementum sagittis vitae et leo duis ut. Sem nulla pharetra diam sit amet nisl suscipit. Enim praesent elementum facilisis leo vel fringilla.',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 3,
                'title' => 'Frontend Developer',
                'slug' => 'frontend-developer',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor orci dapibus. Diam sit amet nisl suscipit adipiscing bibendum est ultricies integer. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Arcu ac tortor dignissim convallis aenean. Ut faucibus pulvinar elementum integer enim neque. Dolor sit amet consectetur adipiscing elit. Nisi porta lorem mollis aliquam. Sed faucibus turpis in eu mi bibendum. Elementum sagittis vitae et leo duis ut. Sem nulla pharetra diam sit amet nisl suscipit. Enim praesent elementum facilisis leo vel fringilla.',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 1,
                'title' => 'Android Developer',
                'slug' => 'android-developer',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor orci dapibus. Diam sit amet nisl suscipit adipiscing bibendum est ultricies integer. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Arcu ac tortor dignissim convallis aenean. Ut faucibus pulvinar elementum integer enim neque. Dolor sit amet consectetur adipiscing elit. Nisi porta lorem mollis aliquam. Sed faucibus turpis in eu mi bibendum. Elementum sagittis vitae et leo duis ut. Sem nulla pharetra diam sit amet nisl suscipit. Enim praesent elementum facilisis leo vel fringilla.',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'user_id' => 3,
                'title' => 'Fullstack Developer',
                'slug' => 'Fullstack-developer',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor orci dapibus. Diam sit amet nisl suscipit adipiscing bibendum est ultricies integer. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Arcu ac tortor dignissim convallis aenean. Ut faucibus pulvinar elementum integer enim neque. Dolor sit amet consectetur adipiscing elit. Nisi porta lorem mollis aliquam. Sed faucibus turpis in eu mi bibendum. Elementum sagittis vitae et leo duis ut. Sem nulla pharetra diam sit amet nisl suscipit. Enim praesent elementum facilisis leo vel fringilla.',
                'created_at'    => now(),
                'updated_at'    => now()
            ]
        ]);
    }
}
