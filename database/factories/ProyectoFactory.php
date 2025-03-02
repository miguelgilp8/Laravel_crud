<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            'titulo' => $this->faker-> sentence(3),
            'horas_previstas' =>$this->faker->numberBetween(1,50),
            'f_comienzo' => $this->faker->date(),
        ];
    }
}
