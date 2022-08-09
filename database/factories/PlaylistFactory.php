<?php

namespace Database\Factories;

use App\Playlist;
use Faker\Generator as Faker;

$factory->define(Playlist::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
