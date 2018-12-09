<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            CommentsTableSeeder::class,
            LikesTableSeeder::class,
            TagsTableSeeder::class,
            PostTagTableSeeder::class,
            FollowersTableSeeder::class,
        ]);

    }
}
