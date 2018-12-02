<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'title' => $faker->sentence(),
        'body' => $faker->paragraphs(rand(5,20), true),
        //
    ];
});
