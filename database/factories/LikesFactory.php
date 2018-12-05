<?php

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Like::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'post_id' => Post::all()->random()->id,
        'like' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});

