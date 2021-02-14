<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PurchaseHistory;
use Faker\Generator as Faker;

$factory->define(PurchaseHistory::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, count(\App\Models\User::all())),
        'product_id' => $faker->numberBetween(1, count(\App\Models\Product::all())),
    ];
});
