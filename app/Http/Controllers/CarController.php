<?php

namespace App\Http\Controllers;

use App\Http\Repos\CarRepo;
use App\Http\Requests\CarPostRequest;
use App\Models\Car;

class CarController extends Controller {

    protected CarRepo $carRepo;

    public function __construct(CarRepo $carRepo) {
        $this->carRepo = $carRepo;
    }

    public function index() {
        return  $this->carRepo->all();
    }

    public function overview() {
        return $this->carRepo->recentFive();
    }

    public function store(CarPostRequest $request) {
        $data = $request->validated();
        $this->carRepo->save($data);
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
