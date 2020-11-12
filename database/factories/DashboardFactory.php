<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;
use App\Dashboard;

$factory->define(Dashboard::class, function (Faker $faker) {
    $clients_id = Client::get('id');
    return [
        'client_id' => $faker->randomElement($clients_id),
        'name' => $faker->name,
        'domaine' => $faker->realText($maxNbChars = 20)
    ];
});
