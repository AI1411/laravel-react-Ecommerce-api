<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $name = $faker->text(10),
        'slug' => \Illuminate\Support\Str::slug($name),
        'image' => 'images/products/' . $faker->randomElement([
            'adam-birkett-QRWAdBCqysc-unsplash.jpg',
            'alexander-rotker-l8p1aWZqHvE-unsplash.jpg',
            'c-d-x-PDX_a_82obo-unsplash.jpg',
            'caroline-attwood-E1rH__X9SA0-unsplash.jpg',
            'charles-deluvio-3IMl0kCxpHQ-unsplash.jpg',
            'chuttersnap-4JHMt29fvj8-unsplash.jpg',
            'cristina-matos-albers-Ltv7a5m8i4c-unsplash.jpg',
            'curology-Ez4VGY-f7-I-unsplash.jpg',
            'curology-j7pKVQrTUsM-unsplash.jpg',
            'curology-sR1oAhAT_Uw-unsplash.jpg',
            'curology-wK0h-mlvfuc-unsplash.jpg',
            'daniel-korpai-hbTKIbuMmBI-unsplash.jpg',
            'deanna-alys-6LBBOwkPzyQ-unsplash.jpg',
            'devin-avery-BRVqq2uak4E-unsplash.jpg',
            'eniko-kis-KsLPTsYaqIQ-unsplash.jpg',
            'galina-n-miziNqvJx5M-unsplash.jpg',
            'giorgio-trovato-p0OlRAAYXLY-unsplash.jpg',
            'grant-ritchie-Jy6UWVb9kqE-unsplash.jpg',
            'grant-ritchie-n_wXNttWVGs-unsplash.jpg',
            'honza-vojtek-UtByU3uhBVM-unsplash.jpg',
            'hyunwon-jang-t8ueo1LnzEU-unsplash.jpg',
            'ian-bevis-IJjfPInzmdk-unsplash.jpg',
            'icons8-team-7LNatQYMzm4-unsplash.jpg',
            'imani-bahati-LxVxPA1LOVM-unsplash.jpg',
            'irene-kredenets-KStSiM1UvPw-unsplash.jpg',
            'jakob-owens-BmH09wAkJa8-unsplash.jpg',
            'jakob-owens-O_bhy3TnSYU-unsplash.jpg',
            'john-fornander-m2WpKnlLcEc-unsplash.jpg',
            'karly-jones-4i9ef6xU738-unsplash.jpg',
            'lee-campbell-GI6L2pkiZgQ-unsplash.jpg',
            'mae-mu-GnWKTJlMYsQ-unsplash.jpg',
            'marek-szturc-0iIV1goIodE-unsplash.jpg',
            'michael-soledad-5vzFrfYJruA-unsplash.jpg',
            'miguel-andrade-potCPE_Cw8A-unsplash.jpg',
            'mikkel-bech-yjAFnkLtKY0-unsplash.jpg',
            'mitzie-organics-dnstpPqCBbw-unsplash.jpg',
            'norbert-levajsics-dUx0gwLbhzs-unsplash.jpg',
            'olena-sergienko-GOVTETevRm8-unsplash.jpg',
            'pat-taylor-12V36G17IbQ-unsplash.jpg',
            'paul-gaudriault-a-QH9MAAVNI-unsplash.jpg',
            'priscilla-du-preez-eBW4v2dC-ts-unsplash.jpg',
            'priscilla-du-preez-ePPcMfzYQ-Y-unsplash.jpg',
            'rachit-tank-2cFZ_FB08UM-unsplash.jpg',
            'revolt-164_6wVEHfI-unsplash.jpg',
            'ruslan-bardash-4kTbAMRAHtQ-unsplash.jpg',
            'sarah-dorweiler-7tFlUFGa7Dk-unsplash.jpg',
            'valeriia-miller-_42NKYROG7g-unsplash.jpg',
            'varun-gaba-dcgB3CgidlU-unsplash.jpg',
            'vinicius-amnx-amano-Nh3I2dycLmw-unsplash.jpg',
        ]),
        'price' => $faker->numberBetween(1000, 10000),
        'description' => $faker->text(100),
        'category_id' => $faker->numberBetween(1, count(Category::all())),
        'tag_id' => $faker->numberBetween(1, 10)
    ];
});
