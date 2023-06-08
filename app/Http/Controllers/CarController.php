<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarPostRequest;
use App\Http\Resources\CarResource;
use App\Models\Agency;
use App\Models\Car;
use App\Models\Category;

class CarController extends Controller {
    public function index() {
        return  CarResource::collection(Car::all());
    }

    public function overview() {
        return CarResource::collection(Car::recentFive());
    }

    public function store(CarPostRequest $request) {
        $data = $request->validated();

        // $car = new Car($data);
        // $car->save();
        // return $car->id;
    }

    public function show(Car $car) {
        return $car;
    }

    public function update(CarPostRequest $request, Car $car) {

        $data = $request->validated();

        $car->update($data);

        return $car;
    }

    public function destroy(Car $car) {
        $deleted = $car->delete();
        return $deleted;
    }
}
