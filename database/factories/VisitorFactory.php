<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    protected $model = Visitor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'age' => fake()->numberBetween(15, 60),
            'address' => fake()->address(),
            'created_at' => fake()->dateTimeBetween('-5 months', 'now', 'Asia/Jakarta')
        ];
    }
}
