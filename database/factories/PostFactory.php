<?php

use App\User;
use App\Category;
use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'title' => $faker->text($maxNbChars = 60, $minNbChars = 60),
        'body' => $faker->paragraphs(rand(5,20), true),
        'ingredients' => "Bacon".","."Beef fat".","."Butter".","."Honey".","."Fructose".","."Maltose",
        'foodPic' => $faker->randomElement(['https://i.imgur.com/ksN9enn.jpg', 'https://i.imgur.com/aubTlm5.jpg', 'https://i.imgur.com/jZcdgBy.jpg', 'https://i.imgur.com/ZNzFZ3f.jpg', 'https://i.imgur.com/fz66Jgw.jpg']),
        'created_at' => $faker->dateTime(),
    ];
});

