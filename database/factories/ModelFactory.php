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
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(8)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Customer::class, function(Faker\Generator $faker) {
    return [
        'first_name' => $faker->name,
		'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(8)),
    ];
});

$factory->define(App\Models\Category::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->catchPhrase,
		'slug' => $faker->slug(2),
		'description' => $faker->text(255),
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


$factory->define(App\Models\Product::class, function(Faker\Generator $faker) {
    return [
        'sku' => $faker->uuid,
		'title' => $faker->catchPhrase,
		'slug' => $faker->slug(3),
		'description' => $faker->text(255),
		'image' => $faker->image(),
		'price' => $faker->randomFloat(2, 0, 100),
		'stock_quantity' => $faker->numberBetween(0, 100),
		'likes' => $faker->numberBetween(0, 100),
		'status' => App\Models\Category::STATUS_ENABLED
    ];
});

$factory->state(App\Models\Product::class, 'enabled', function(Faker\Generator $faker) {
    return [
		'status' => App\Models\Product::STATUS_ENABLED
    ];
});

$factory->state(App\Models\Product::class, 'disabled', function(Faker\Generator $faker) {
    return [
		'status' => App\Models\Product::STATUS_DISABLED
    ];
});