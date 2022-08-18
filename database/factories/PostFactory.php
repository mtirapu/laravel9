<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            // El titulo es igual a una oracion falsa generada.
            'title' => $title = $this->faker->sentence(),
            'slug' => Str::slug($title),
            // El body va a ser un texto de 2200 palabras.
            'body' => $this->faker->text(2200),

        ];
    }
}
