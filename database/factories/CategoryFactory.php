<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->text(10),
        'slug' => \Illuminate\Support\Str::slug($name),
        'main_category_id' => $faker->numberBetween(1, 3),
    ];
});
