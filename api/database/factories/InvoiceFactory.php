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
            'number' => fake()->numerify('#########'),
            'value' => fake()->randomFloat(2),
            'issue_date' => fake()->date(),
            'sender_cnpj' => fake('pt_BR')->cnpj(),
            'sender_name' => fake()->name(),
            'carrier_cnpj' => fake('pt_BR')->cnpj(),
            'carrier_name' => fake()->name(),
        ];
    }
}
