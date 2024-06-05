<?php

namespace App\Http\Actions;

use App\Models\Car;
use App\Models\Part;

class UpdateCar
{
    public static function handle($attributes, Car $car)
    {
        $car->parts()->delete();
        $car->update($attributes);
        foreach ($attributes['parts'] as $part) {
            $car->parts()->create($part);
        }

        return $car->load('parts');
    }
}
