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
        'ingredients' => "8 ounces baby carrots".","."8 ounces Brussels sprouts, halved lengthwise".","."1 small red onion, peeled and cut into 8 wedges".","."3 tablespoons olive oil".","."2 teaspoons chopped fresh rosemary".","."1 teaspoon kosher salt".","."1/2 teaspoon black pepper".","."1 (12 ounce) package Hillshire Farm® Rope Smoked Sausage, cut in 1/2 bias-cut slices".","."1 medium Honeycrisp apple, cut into 12 wedges",
        'foodPic' => $faker->randomElement(['https://i.imgur.com/ksN9enn.jpg', 'https://i.imgur.com/aubTlm5.jpg', 'https://i.imgur.com/jZcdgBy.jpg', 'https://i.imgur.com/ZNzFZ3f.jpg', 'https://i.imgur.com/fz66Jgw.jpg']),
        'created_at' => $faker->dateTime(),
    ];
});

