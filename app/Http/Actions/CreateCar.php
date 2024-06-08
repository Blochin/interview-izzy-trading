<?php

namespace App\Http\Actions;

use App\Models\Car;

class CreateCar
{
    public static function handle($attributes)
    {
        /** @var Car $car */
        $car = Car::create($attributes);

        foreach ($attributes['parts'] as $part) {
            $car->parts()->create($part);
        }

        return $car;
    }
}
