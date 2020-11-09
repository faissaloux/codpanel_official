<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Cities;
use App\User;

$factory->define(Cities::class, function (Faker $faker) {
    $providers_id = User::where('role', 'provider')->get('id');
    return [
        'name' => $faker->city,
        'provider_id' => $faker->randomElement($providers_id) ,
        'reference' => $faker->isbn10
    ];
});
