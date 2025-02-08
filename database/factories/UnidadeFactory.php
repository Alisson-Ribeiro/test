<?php

namespace Database\Factories;

use App\Models\Bandeira;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unidade>
 */
class UnidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_fantasia' => $this->faker->company,            // Nome fantasia aleatório
            'razao_social' => $this->faker->company . ' LTDA',   // Razão social aleatória
            'cnpj' => $this->generateCnpj(),                     // Gera um CNPJ válido
            'bandeira_id' => Bandeira::factory(),                // Relaciona a uma Bandeira gerada pela factory
            'created_at' => now(),                               // Data de criação
            'updated_at' => now(),                               // Data de atualização
        ];
    }

    /**
     * Método auxiliar para gerar CNPJ válido no formato 00.000.000/0000-00
     */
    private function generateCnpj(): string
    {
        $baseCnpj = $this->faker->numerify('########0001'); // Parte inicial fixa do CNPJ
        $digitos = $this->calculateCnpjDigits($baseCnpj);
        return substr($baseCnpj, 0, 2) . '.' . substr($baseCnpj, 2, 3) . '.' . substr($baseCnpj, 5, 3) . '/' . substr($baseCnpj, 8, 4) . '-' . $digitos;
    }

    /**
     * Método auxiliar para calcular os dígitos verificadores do CNPJ
     */
    private function calculateCnpjDigits(string $baseCnpj): string
    {
        $multiplicadores = [[5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2], [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2]];
        $digitos = '';

        for ($i = 0; $i < 2; $i++) {
            $soma = 0;

            foreach (str_split($baseCnpj . $digitos) as $indice => $numero) {
                $soma += $numero * $multiplicadores[$i][$indice];
            }

            $resto = $soma % 11;
            $digitos .= $resto < 2 ? 0 : 11 - $resto;
        }

        return $digitos;
    }
}
