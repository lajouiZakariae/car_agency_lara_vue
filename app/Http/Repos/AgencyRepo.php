<?php

namespace App\Http\Repos;

use App\Models\Agency;

class AgencyRepo {
    public function all() {
        return Agency::all(["id", "name"]);
    }

    public function allWithCarCount() {
        return (Agency::allWithCarCount());
    }

    public function getWithRecentCars($id) {
        $agency = Agency::find($id, ["id", "name"]);
        return [
            "agency" => $agency,
            "cars" => $agency->cars()->take(5)->get(["id", "make", "model", "agency_id"])
        ];
    }

    public function save($_agency) {
        // $car = new Car($_car);
        // $car->save();
        // return $car->id;
    }
}
