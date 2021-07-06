<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'graduation_id'    => $faker->numberBetween($min = 1, $max= 10),
        're'            => $faker->unique()->numerify('1######'),
        'warname'       => $faker->firstName($gender = 'male'|'female'),
        'cpf'           => $faker->numerify('###########'),
        'rg'            => $faker->numberBetween($min = 160000000, $max = 450000000),
        'birthdate'     => $faker->date($format = 'Y-m-d', $max = 'now'),
        'admissiondate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'opm_id'        => $faker->numberBetween($min = 1, $max = 4),

        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'activeservice' => $faker->boolean,
    ];
});
