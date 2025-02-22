<?php

namespace Database\Factories;

use App\Models\GrupoEconomico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GrupoEconomico>
 */
class GrupoEconomicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name() // nome aleatório
        ];
    }
}
