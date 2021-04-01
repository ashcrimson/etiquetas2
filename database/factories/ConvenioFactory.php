<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Convenio;
use Faker\Generator as Faker;

$factory->define(Convenio::class, function (Faker $faker) {

    return [
        'rut' => $this->faker->word,
        'razon_social' => $this->faker->word,
        'direccion' => $this->faker->word,
        'formalizado' => $this->faker->word,
        'acuerdo_comercial' => $this->faker->word,
        'tramite' => $this->faker->word,
        'historico' => $this->faker->word,
        'inicio_vigencia' => $this->faker->word,
        'termino_vigencia' => $this->faker->word,
        'observacion_termino' => $this->faker->word,
        'observaciones' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
