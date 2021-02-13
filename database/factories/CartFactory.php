<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1, \App\Models\Product::all()->count()),
        'user_id' => 1
    ];
});
