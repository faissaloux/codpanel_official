<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Order;
use App\Payment;
use App\User;

$factory->define(Order::class, function (Faker $faker) {
    $users_id = User::get('id');
    $payments_id = Payment::get('id');

    return [
        'status' => $faker->randomElement(['new', 'confirmed', 'recall', 'unanswered', 'canceled']),
        'user_id' => $faker->randomElement($users_id),
        'currency' => $faker->randomElement(['USD', 'MAD']),
        'payment_id' => $faker->randomElement($payments_id),
        'serial' => $faker->isbn10,
        'device' => $faker->randomElement(['Desktop', 'Mobile']),
        'ip' => $faker->numberBetween($min = 0, $max = 255),
        'country' => $faker->randomElement(['Morocco', 'UK', 'USA']),
    ];
});
