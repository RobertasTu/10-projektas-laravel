<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Owner;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName(),
        'surname'=>$faker->lastName(),
        'email'=>$faker->email(),
        'phone'=>$faker->e164PhoneNumber()
    ];
});
