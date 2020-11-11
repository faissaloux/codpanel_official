<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Lists;
use App\User;
use App\Cities;
use App\Products;
use \Carbon\Carbon;

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
        'phone' => $faker->regexify('6[0-9]{8}'),
        'source' => $faker->realText($maxNbChars = 10),
        'provider_id' => $faker->randomElement($providers_id),
        'employee_id' => $faker->randomElement($employees_id),
        'handler' => $faker->randomElement(['employee', 'provider']),
        'city_id' => $faker->randomElement($cities_id),
        'laivraison' => $faker->numberBetween($min = 1, $max = 100),
        'cancel_reason' => $faker->realText($maxNbChars = 50),
        'delivred_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'canceled_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'duplicated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'checked_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'recall_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'history' => $faker->realText($maxNbChars = 50),
        'product' => ($faker->randomElement($products_name))->name,
        'city' => ($faker->randomElement($cities_name))->name,
        'quantity' => $faker->numberBetween($min = 1, $max = 9999),
        'price' => $faker->numberBetween($min = 1, $max = 999),
        'status' => $faker->randomElement(['new', 'confirmed', 'recall', 'unanswered', 'canceled']),
        'unanswered_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});
