<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'user_id' => User::all()->random()->id,
            'description'  => fake()->sentence(),
            'quantity' => fake()->numberBetween(0, 100),
            'category' => fake()->randomElement(['automoveis', 'brinquedos', 'eletronicos', 'outros']),
            'price' => fake()->randomFloat(2, 0, 100),
            'product_url' => 'https://media.istockphoto.com/id/1206806317/pt/vetorial/shopping-cart-icon-isolated-on-white-background.jpg?s=170667a&w=0&k=20&c=IVUUoGOrGoMwS8sfux2fp5EJIvurys1hVVlUaYoEAQc=',
        ];


    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    
}
