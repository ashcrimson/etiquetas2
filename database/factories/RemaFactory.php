<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rema;
use Faker\Generator as Faker;

$factory->define(Rema::class, function (Faker $faker) {

    return [
        'paciente_id' => $this->faker->word,
        'numero_unidad' => $this->faker->word,
        'nombres_conductor' => $this->faker->word,
        'apellidos_conductor' => $this->faker->word,
        'hora_de_llamada' => $this->faker->word,
        'hora_de_salida' => $this->faker->word,
        'hora_de_llegada' => $this->faker->word,
        'user_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
