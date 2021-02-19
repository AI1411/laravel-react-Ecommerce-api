<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(['male', 'female']),
        'address' => $faker->address,
        'tel' => $faker->randomElement(['090', '080', '070']) . $faker->numberBetween(11111111, 99999999),
        'image' => 'images/users/' . $faker->randomElement([
            'ahmet-hamdi-N_B7H4Fr-AI-unsplash.jpg',
            'alireza-zarafshani-yN1Ok6kv900-unsplash.jpg',
            'altin-ferreira-FS3cfZ78ohk-unsplash.jpg',
            'aw1ye-f32p6.png',
            'clem-onojeghuo-Mm8J-IizOmc-unsplash.jpg',
            'jasmin-chew-xHQkBKrYcz4-unsplash.jpg',
            'joel-mott-Z8MesVFSYac-unsplash.jpg',
            'kevin-laminto-DeWYiaomccI-unsplash.jpg',
            'khashayar-kouchpeydeh-DT4xZO3pTLo-unsplash.jpg',
            'leonie-zettl-D72tx-xAxvY-unsplash.jpg',
        ]),
        'birthday' => $faker->dateTime,
        'status' => $faker->numberBetween(1, 2),
        'email' => $faker->unique()->safeEmail,
        'money' => $faker->numberBetween(10000, 50000),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
