<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero' => fake()->numerify('#########'),
            'valor' => fake()->randomFloat(2),
            'data_emissao' => fake()->date(),
            'cnpj_remetente' => fake('pt_BR')->cnpj(),
            'nome_remetente' => fake()->name(),
            'cnpj_transportador' => fake('pt_BR')->cnpj(),
            'nome_transportador' => fake()->name(),
        ];
    }
}
