<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'title' => $faker->sentence(),
        'body' => $faker->paragraphs(rand(5,20), true),
        //
    ];
});

