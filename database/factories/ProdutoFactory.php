<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipos = [
            'camisa' => 'https://source.unsplash.com/400x400/?shirt',
            'calça' => 'https://source.unsplash.com/400x400/?jeans',
            'tênis' => 'https://source.unsplash.com/400x400/?sneakers',
            'bermuda' => 'https://source.unsplash.com/400x400/?shorts',
        ];

        $tipo = $this->faker->randomElement(array_keys($tipos));
        $imagem = $tipos[$tipo];

        return [
            'categoria_id' => Categoria::factory(),
            'nome' => ucfirst($tipo) . ' ' . $this->faker->word(),
            'descricao' => $this->faker->sentence(10),
            'preco' => $this->faker->randomFloat(2, 49.90, 349.90),
            'estoque' => $this->faker->numberBetween(0, 100),
            'imagem' => $imagem,
            'tipo' => $tipo, // opcional se quiser salvar o tipo separadamente
        ];
    }
}
