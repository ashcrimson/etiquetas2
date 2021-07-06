<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {

    return [
        'rut' => $this->faker->word,
        'nombres' => $this->faker->word,
        'apellidos' => $this->faker->word,
        'cargo_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
