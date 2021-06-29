<?php

namespace Database\Factories;

use App\Models\RemaEstado;
use Illuminate\Database\Eloquent\Factories\Factory;

class RemaEstadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RemaEstado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        ];
    }
}
