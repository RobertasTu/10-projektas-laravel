<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Type;
use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title'=>$faker->company(),
        'description'=>$faker->sentence(4),
        'type_id'=>rand(1,4),
        'owner_id'=>rand(1,10),
        'start_date'=>$faker->dateTimeThisYear('-2 months'),
        'end_date'=>$faker->dateTimeThisYear('+2 months'),

        'logo'=>$faker->imageUrl(640, 480, 'cats'),
    ];
});
