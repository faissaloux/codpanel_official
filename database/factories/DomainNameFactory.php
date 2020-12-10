<?php


/** @var Factory $factory */

use App\DomainName;
use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(DomainName::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,  // Random task title
        'expired_at' => (new \DateTimeImmutable())->add(new DateInterval('P2Y')), // Random task description
    ];
});
