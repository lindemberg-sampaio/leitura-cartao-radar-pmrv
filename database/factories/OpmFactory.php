<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Opm::class, function (Faker $faker) {
    return [
        'number'        => $faker->unique()->numberBetween($min=100, $max=643),
        'address'       => $faker->streetAddress,
        'city'          => $faker->city,
        'phone'         => $faker->tollFreePhoneNumber,
        'mobilephone'   => $faker->tollFreePhoneNumber,
    ];
});
