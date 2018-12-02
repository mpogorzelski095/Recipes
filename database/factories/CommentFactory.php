<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
      'user_id' => rand(1, 100),
      'post_id' => rand(1, 100),
      'body' => $faker->paragraphs(rand(1,3), true),
    ];
});
