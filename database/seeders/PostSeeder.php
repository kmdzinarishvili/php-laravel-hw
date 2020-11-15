<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id'=>1,
            'title' => Str::random(10),
            'post_text' => Str::random(100),
            'likes' => rand(),
        ]);
        //
    }
}
