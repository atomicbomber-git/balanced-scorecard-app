<?php

use Faker\Generator as Faker;

$factory->define(App\StrategicObjective::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'perspective' => $faker->randomElement(App\StrategicObjective::PERSPECTIVES)
    ];
});
