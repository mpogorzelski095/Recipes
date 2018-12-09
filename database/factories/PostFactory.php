<?php

use App\User;
use App\Category;
use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'title' => $faker->sentence(),
        'body' => $faker->paragraphs(rand(5,20), true),
        'ingredients' => "Bacon".","."Beef fat".","."Butter".","."Honey".","."Fructose".","."Maltose",
        'foodPic' => $faker->randomElement(['https://i.imgur.com/OlOXdEr.jpg', 'https://i.imgur.com/38TEU0o.jpg']),
        'created_at' => $faker->dateTime(),
    ];
});

