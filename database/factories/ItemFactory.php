<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Items;
use App\Lists;
use App\Products;

$factory->define(Items::class, function (Faker $faker) {
    $products_id = Products::get('id');
    return [
        'product_id' => $faker->randomElement($products_id),
        'price' => $faker->numberBetween($min = 1, $max = 999),
        'quantity' => $faker->numberBetween($min = 1, $max = 9999)
    ];
});
