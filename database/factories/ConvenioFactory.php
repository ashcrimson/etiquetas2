<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Convenio;
use Faker\Generator as Faker;

$factory->define(Convenio::class, function (Faker $faker) {

    return [
        'entidad' => $this->faker->word,
        'atencion_urgencia' => $this->faker->word,
        'consulta_especialidad' => $this->faker->word,
        'laboratorio' => $this->faker->word,
        'rayos_x_e_imagenologia' => $this->faker->word,
        'procedimiento' => $this->faker->word,
        'endoscopia_urologica' => $this->faker->word,
        'servicio_de_esterilizacion' => $this->faker->word,
        'hospitalizacion' => $this->faker->word,
        'ginecologia' => $this->faker->word,
        'urologia' => $this->faker->word,
        'cirugia_mediana_complejidad' => $this->faker->word,
        'otorrinolaringologia' => $this->faker->word,
        'medicina_nuclear' => $this->faker->word,
        'hemodinamia' => $this->faker->word,
        'medicina_complementaria' => $this->faker->word,
        'esterilizacion' => $this->faker->word,
        'formalizado' => $this->faker->word,
        'acuerdo_comercial' => $this->faker->word,
        'tramite' => $this->faker->word,
        'historico' => $this->faker->word,
        'inicio_vigencia' => $this->faker->word,
        'termino_vigencia' => $this->faker->word,
        'observaciones' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
