<?php

namespace Database\Factories;

use App\Models\Unidade;
use App\Models\Colaborador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colaborador>
 */
class ColaboradorFactory extends Factory
{
    protected $model = Colaborador::class();
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,                                   // gera nome aleatório
            'email' => $this->faker->unique()->safeEmail,                   // gera email único
            'cpf' => $this->faker->unique()->numerify('###.###.###-##'),    // cpf ficticio
            'unidade_id' => Unidade::Factory(),                             // gera uma unidade relacionada
            'created_at' => now(),                                          // data de criação
            'updated_at' => now(),                                          // data de atualização
        ];
    }
}
