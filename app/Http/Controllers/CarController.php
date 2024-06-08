<?php

namespace App\Http\Controllers;

use App\Http\Actions\CreateCar;
use App\Http\Actions\UpdateCar;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Inertia\Inertia;

class CarController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Cars', [
            'cars' => CarResource::collection(Car::all())
        ]);
    }

    public function show(Car $car)
    {
        return CarResource::make($car);
    }

    public function new()
    {
        return Inertia::render('CarForm', [
            'car' => CarResource::make(new Car()),
        ]);
    }

    public function store(StoreCarRequest $request)
    {
        return CreateCar::handle($request->validated());
    }

    public function edit(Car $car)
    {
        return Inertia::render('CarForm', [
            'car' => CarResource::make($car)
        ]);
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        return UpdateCar::handle($request->validated(), $car);
    }

    public function destroy(Car $car)
    {
        $car->parts()->delete();
        $car->delete();
    }
}
