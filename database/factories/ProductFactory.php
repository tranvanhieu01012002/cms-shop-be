<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->name(),
            'slug' => fake()->name(),
            'sku' => "sku_".rand(1,1000),
            'barcode' => "barcode_".rand(1,1000),
            'stock' => rand(1,1000),
            'price' => rand(1,100)*1000
        ];
    }
}
