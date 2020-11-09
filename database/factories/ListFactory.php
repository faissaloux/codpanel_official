<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Lists;
use App\User;
use App\Cities;
use App\Products;

$factory->define(Lists::class, function (Faker $faker) {
    $providers_id = User::where('role', 'provider')->get('id');
    $employees_id = User::where('role', 'employee')->get('id');
    $cities_id = Cities::get('id');
    $products_name = Products::get('name');
    $cities_name = Cities::get('name');
    return [
        'name' => $faker->name,
        'adress' => $faker->streetAddress,
        'note' => $faker->realText($maxNbChars = 100),
        'tel' => $faker->regexify('6[0-9]{8}'),
        'source' => $faker->realText($maxNbChars = 10),
        'provider_id' => $faker->randomElement($providers_id),
        'employee_id' => $faker->randomElement($employees_id),
        'handler' => $faker->randomElement(['employee', 'provider']),
        'city_id' => $faker->randomElement($cities_id),
        'laivraison' => $faker->numberBetween($min = 1, $max = 100),
        'cancel_reason' => $faker->realText($maxNbChars = 50),
        'accepted_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'verified_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'delivred_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'canceled_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'duplicated_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'checked_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'recall_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'history' => $faker->realText($maxNbChars = 50),
        'product' => $faker->randomElement($products_name),
        'city' => $faker->randomElement($cities_name),
        'quantity' => $faker->numberBetween($min = 1, $max = 9999),
        'price' => $faker->numberBetween($min = 1, $max = 999),
        'status' => $faker->randomElement(['new', 'confirmed', 'recall', 'unanswered', 'canceled']),
        'unanswered_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
