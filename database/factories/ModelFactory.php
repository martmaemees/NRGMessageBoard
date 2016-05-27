<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
//
//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => 'admin',
//        'email' => 'admin@admin.com',
//        'password' => bcrypt('123456'),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Message::class, function(Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'startdate' => $faker->dateTimeBetween($startDate = '-30 days', $interval = '- 5 days'),
        'enddate' => $faker->dateTimeBetween($startDate = '+ 5 days', $enddate = '+ 30 days'),
        'user_id' => $faker->numberBetween(1, 10)
    ];
});

