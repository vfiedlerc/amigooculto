<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sorteio;
use Faker\Generator as Faker;

$factory->define(Sorteio::class, function (Faker $faker) {
    return [
        'descricao' =>  'Sorteio '.$faker->streetName."--".$faker->name,
        'created_at' => now(),
        'updated_at' => now(), // password
    ];
});
