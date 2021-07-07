<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Preparacion;
use Faker\Generator as Faker;

$factory->define(Preparacion::class, function (Faker $faker) {

    return [
        'fecha_admision' => $faker->date('Y-m-d H:i:s'),
        'paciente_id' => \App\Models\Paciente::all()->random()->id,
        'profesional_a_cargo' => $faker->word,
        'responsable_id' => \App\Models\Empleado::quimico()->get()->random()->id,
        'droga_id' => \App\Models\Droga::all()->random()->id,
        'dosis' => $faker->randomDigitNotZero(),
        'dilucion_id' => \App\Models\Dilucion::all()->random()->id,
        'volumen_suero' => $faker->randomDigitNotZero(),
        'volumen_agregado' => $faker->randomDigitNotZero(),
        'volumen_final' => $faker->randomDigitNotZero(),
        'bajada' => $faker->randomElement(["venotek","ON-70","Hospira","Jeringa","Cassette"]),
        'medico_id' => \App\Models\Empleado::medico()->get()->random()->id,
        'servicio_solicitante' => $faker->randomElement(["7 Norte","Pediatria","Pabellón","Cir.menor",]),
        'protocolo_id' => \App\Models\Protocolo::all()->random()->id,
        'ciclo' => $faker->word,
        'dia' => $faker->dayOfWeek,
        'control_producto_terminado' => $faker->text,
        'entrega_conforme_enfermeria' => $faker->text,
        'Refrigerar' => rand(0,1),
        'proteger_luz' => rand(0,1),
        'user_id' => \App\Models\User::all()->random()->id,
        'estado_id' => \App\Models\PreparacionEstado::all()->random()->id,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
