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

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Favorite::class, function (Faker\Generator $faker) {
    $user_ids = App\User::lists('id')->toArray();
    return [
        'user_id' => $faker->randomElement($user_ids),
        'url' => $faker->url,
        'title' => $faker->sentence,
    ];
});

$factory->define(App\Favorite::class, function (Faker\Generator $faker) {
    $user_ids = App\User::lists('id')->toArray();
    return [
        'user_id' => $faker->randomElement($user_ids),
        'url' => $faker->url,
        'title' => $faker->sentence,
    ];
});
