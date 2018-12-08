<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $name = $faker->firstName;
    $lastname = $faker->lastName;
    return [
        'name' => $name." ".$lastname,
        'email' => $name.$lastname."@gmail.com",
        'password' => '$2y$10$oldr/jDwzjYDx7ArNB7ZKefc/lDkBs.J42PxCrTWSIynScgu7mYCy', // secret
        'remember_token' => str_random(10),
    ];
});
