<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Board;
use Faker\Generator as Faker;

$factory->define(Board::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'group_id' => 1,
        'description' => $faker->sentence
    ];
});
