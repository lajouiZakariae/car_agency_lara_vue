<?php

namespace App\Http\Controllers;

use App\Http\Requests\BodyStylePostRequest;
use App\Models\BodyStyle;
use Illuminate\Http\Request;

class BodyStyleController extends Controller {
    public function index() {
        return BodyStyle::all();
    }

    public function store(BodyStylePostRequest $request) {
    }

    public function show(BodyStyle $BodyStyle) {
        return $BodyStyle->cars;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BodyStylePostRequest $request, BodyStyle $BodyStyle) {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BodyStyle $BodyStyle) {
        $BodyStyle->delete();
    }
}
