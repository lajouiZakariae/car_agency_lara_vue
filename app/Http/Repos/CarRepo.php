<?php

namespace App\Http\Repos;

use App\Models\Car;

class CarRepo {
    public function all() {
        return Car::all();
    }

    public function recentFive() {
        return Car::orderBy("created_at", "desc")->take(5)->get(["make", "model", "id"]);
    }

    public function save($_car) {
        $car = new Car($_car);
        $car->save();
        return $car->id;
    }
}
