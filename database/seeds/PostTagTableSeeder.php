<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $tags = Tag::all();

        foreach ($tags as $tag) {
            $tag->posts()->sync($posts->random(20)->pluck('id'));
        }
    }
}
