<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\EquipementInstance::class, function (Faker $faker) {
    return [
        'reference' => $faker->name,
        'number' => $faker->numberBetween(0,5),
        'equipement_id' => 1,
        'status' => 'new',
    ];
});
