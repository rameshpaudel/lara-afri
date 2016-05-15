<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your Models factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default Models should look.
|
*/



$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->username,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\PersonalProfile::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'country' => $faker->country,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => $factory->create(App\User::class)->id,
    ];
});
$factory->define(App\BusinessProfile::class, function (Faker\Generator $faker) {
    return [
        'user_type' => rand(0,2),
        'company_name' => $faker->firstName,
        'city' => $faker->lastName,
        'country' => $faker->country,
        'address' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'established_on' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => $factory->create(App\User::class)->id,
    ];
});


