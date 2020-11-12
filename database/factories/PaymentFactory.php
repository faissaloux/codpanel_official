<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Payment;
use App\Order;

$factory->define(Payment::class, function (Faker $faker) {
    $orders_id = Order::get('id');
    return [
        'order_id' => $faker->randomElement($orders_id),
        'amount' => $faker->numberBetween($min = 1, $max = 999),
        'paid' => $faker->randomElement(['0', '1'])
    ];
});
