<?php

namespace App\Http\Controllers;

use App\Http\Repos\AgencyRepo;
use App\Http\Requests\AgencyPostRequest;
use App\Models\Agency;

class AgencyController extends Controller {
    public function index(AgencyRepo $agencyRepo) {
        return $agencyRepo->all();
    }

    public function overview(AgencyRepo $agencyRepo) {
        return $agencyRepo->allWithCarCount();
    }

    public function store(AgencyPostRequest $request) {
        $request->validated();
    }

    public function show(AgencyRepo $agencyRepo, $id) {
        return $agencyRepo->getWithRecentCars($id);
    }

    public function update(AgencyPostRequest $request, Agency $agency) {
        $agency->update();
    }

    public function destroy(Agency $agency) {
        return $agency->delete();
    }
}
