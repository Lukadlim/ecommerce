<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $slugname = $this->faker->unique()->sentence();
        $name = explode(" ", $slugname)[0];
        return [
            'name' => $name,
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1000, 10000),
            'image' => $this->faker->imageUrl,
            'slug' => Str::slug($slugname),
            'stock' => $this->faker->randomDigit(),
        ];
    }
}
