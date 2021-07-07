<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {

    return [
        'rut' => rand(44444444,99999999),
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'cargo_id' => \App\Models\Cargo::all()->random()->id,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
