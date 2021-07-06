<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Preparacion;
use Faker\Generator as Faker;

$factory->define(Preparacion::class, function (Faker $faker) {

    return [
        'fecha_admision' => $this->faker->date('Y-m-d H:i:s'),
        'paciente_id' => $this->faker->word,
        'profesional_a_cargo' => $this->faker->word,
        'responsable_id' => $this->faker->word,
        'droga_id' => $this->faker->word,
        'dosis' => $this->faker->word,
        'dilucion_id' => $this->faker->word,
        'volumen_suero' => $this->faker->word,
        'volumen_agregado' => $this->faker->word,
        'volumen_final' => $this->faker->word,
        'bajada' => $this->faker->word,
        'medico_id' => $this->faker->word,
        'servicio_solicitante' => $this->faker->word,
        'protocolo_id' => $this->faker->word,
        'ciclo' => $this->faker->word,
        'dia' => $this->faker->word,
        'control_producto_terminado' => $this->faker->text,
        'entrega_conforme_enfermeria' => $this->faker->text,
        'Refrigerar' => $this->faker->word,
        'proteger_luz' => $this->faker->word,
        'user_id' => $this->faker->word,
        'estado_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
