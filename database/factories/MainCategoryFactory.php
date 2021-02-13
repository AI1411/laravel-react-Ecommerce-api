<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MainCategory;
use Faker\Generator as Faker;

$factory->define(MainCategory::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->text(10),
        'slug' => \Illuminate\Support\Str::slug($name),
    ];
});
