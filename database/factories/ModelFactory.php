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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function(Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Customer::class, function(Faker\Generator $faker) {
    return [
        'first_name' => $faker->name,
		'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('qwerty'),
    ];
});

$factory->define(App\Models\Category::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->name,
		'slug' => $faker->slug(3),
		'description' => $faker->company,
		'status' => App\Models\Category::STATUS_ENABLED
    ];
});

$factory->state(App\Models\Category::class, 'enabled', function(Faker\Generator $faker) {
    return [
		'status' => App\Models\Category::STATUS_ENABLED
    ];
});

$factory->state(App\Models\Category::class, 'disabled', function(Faker\Generator $faker) {
    return [
		'status' => App\Models\Category::STATUS_DISABLED
    ];
});