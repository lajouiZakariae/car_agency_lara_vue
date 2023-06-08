<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgencyPostRequest;
use App\Models\Agency;
use App\Models\Inventory;
use Illuminate\Http\Request;

class AgencyController extends Controller {
    public function index() {
        return Agency::all();
    }

    public function store(AgencyPostRequest $request) {
        $request->validated();
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency) {
        return  $agency->cars;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgencyPostRequest $request, Agency $agency) {
        $agency->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency) {
        return $agency->delete();
    }
}
