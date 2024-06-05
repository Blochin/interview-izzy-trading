<?php

namespace Feature\Http\Controllers;

use Database\Factories\CarFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_store_car_and_parts()
    {
        $this->post('/cars/', [
            'name' => 'Test Car',
            'registration_number' => 1,
            'is_registered' => true,
            'parts' => [
                ['name' => 'Test part1', 'serial_number' => 1],
                ['name' => 'Test part2', 'serial_number' => 2],
            ],
        ]);

        $this->assertDatabaseHas('cars', ['name' => 'Test Car']);
        $this->assertDatabaseHas('parts', ['name' => 'Test part1', 'serial_number' => 1]);
        $this->assertDatabaseHas('parts', ['name' => 'Test part2', 'serial_number' => 2]);
    }

    #[Test]
    public function it_can_update_car_and_parts()
    {

        $car = CarFactory::new()->create();

        $parts = [
            ['name' => 'Test part1', 'serial_number' => 1],
            ['name' => 'Test part2', 'serial_number' => 2],
        ];

        foreach ($parts as $part) {
            $car->parts()->create($part);
        }

        $this->put('/cars/' . $car->id, [
            'name' => 'Updated Car',
            'registration_number' => 2,
            'is_registered' => false,
            'parts' => [
                ['name' => 'Updated part1', 'serial_number' => 1],
                ['name' => 'New part', 'serial_number' => 3],
            ],
        ]);

        $this->assertDatabaseHas('cars', ['name' => 'Updated Car', 'registration_number' => 2, 'is_registered' => false]);

        $this->assertDatabaseHas('parts', ['name' => 'Updated part1', 'serial_number' => 1]);
        $this->assertDatabaseHas('parts', ['name' => 'New part', 'serial_number' => 3]);

        $this->assertDatabaseMissing('parts', ['name' => 'Test part1', 'serial_number' => 1]);
    }

    #[Test]
    public function it_destroy_car()
    {
        $car = CarFactory::new()->create();
        $this->delete('/cars/' . $car->id);

        $parts = [
            ['name' => 'Test part1', 'serial_number' => 1],
            ['name' => 'Test part2', 'serial_number' => 2],
        ];

        foreach ($parts as $part) {
            $car->parts()->create($part);
        }

        $this->assertDatabaseMissing('cars', ['name' => $car->name, 'registration_number' => $car->registration_number]);
    }

}
