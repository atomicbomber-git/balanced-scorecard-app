<?php

use Faker\Generator as Faker;

$factory->define(App\KeyPerformanceIndicator::class, function (Faker $faker) {
    return [
        'name' => $faker->bs,
        'action_plan' => $faker->bs,
        'current' => $faker->randomNumber(2),
        'target' => $faker->randomNumber(2),
        'actual' => $faker->randomNumber(2)
    ];
});
