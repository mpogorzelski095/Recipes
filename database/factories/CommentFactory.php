<?php

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
      'user_id' => User::all()->random()->id,
      'post_id' => Post::all()->random()->id,
      'body' => $faker->paragraphs(rand(1,3), true),
    ];
});
