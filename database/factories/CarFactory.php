<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'registration_number' => $this->faker->uuid,
            'is_registered' => $this->faker->boolean,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Car $car) {
            $car->parts()->saveMany(Part::factory()->count(rand(1, 5))->make());
        });
    }
}
