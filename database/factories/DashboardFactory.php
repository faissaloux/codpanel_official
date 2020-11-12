<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Dashboard;
use \Carbon\Carbon;

$factory->define(Dashboard::class, function (Faker $faker) {
    return [
        'cliend_id' => $faker->name,
        'name' => $faker->name,
        'domaine' => $faker->realText($maxNbChars = 20)
    ];
});
