<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Room::class, function (Faker $faker) {
    return [
        'number' => $faker->numberBetween(10,10000),
        'bloc_id' => 1
    ];
});
