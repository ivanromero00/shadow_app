<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notes;
use Faker\Generator as Faker;

$factory->define(Notes::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'board_id' => 1,
        'content' => $faker->sentence,
        'image_path' => 'defecto'
    ];
});
