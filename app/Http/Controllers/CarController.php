<?php

namespace App\Http\Controllers;

use App\Http\Actions\CreateCar;
use App\Http\Actions\UpdateCar;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        return Car::with('parts')->get();
    }

    public function store(StoreCarRequest $request)
    {
        return CreateCar::handle($request->validated());
    }

    public function show(Car $car)
    {
        return $car->load('parts');
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        return UpdateCar::handle($request->validated(), $car);
    }

    public function destroy(Car $car)
    {
        $car->delete();
    }

}
