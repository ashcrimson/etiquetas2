<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PacienteAtencion;
use Faker\Generator as Faker;

$factory->define(PacienteAtencion::class, function (Faker $faker) {

    return [
        'paciente_id' => $this->faker->word,
        'rema_id' => $this->faker->word,
        'motivo_consulta' => $this->faker->text,
        'clasificacion_triaje' => $this->faker->word,
        'presion_arterial' => $this->faker->word,
        'frecuencia_cardiaca' => $this->faker->word,
        'frecuencia_respiratoria' => $this->faker->word,
        'temperatura' => $this->faker->randomDigitNotNull,
        'saturacion_oxigeno' => $this->faker->randomDigitNotNull,
        'atencion_enfermeria' => $this->faker->text,
        'antecedentes_morbidos' => $this->faker->text,
        'alergias' => $this->faker->text,
        'medicamentos_habituales' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
