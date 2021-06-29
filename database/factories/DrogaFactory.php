<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Droga;
use Faker\Generator as Faker;

$factory->define(Droga::class, function (Faker $faker) {

    return [
        'nombre' => $this->faker->word,
        'dosis' => rand(3000,5000),
        'suero_dilusion' => $this->faker->word,
        'vol_agregado' => rand(3000,5000),
        'vol_final' => rand(3000,5000),
        'bajada' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        
    ];
});
