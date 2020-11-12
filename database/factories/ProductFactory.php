<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Products;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Jeans', 'Hat', 'boots', 'snickers', 'shoes']),
        'price' => $faker->numberBetween($min = 1, $max = 999),
        'prix_jmla' => $faker->numberBetween($min = 1, $max = 999),
        'reference' => $faker->isbn10
    ];
});
