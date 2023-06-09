<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\CarController;
use App\Models\BodyStyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("cars", CarController::class);
Route::get("cars/overview", [CarController::class, "overview"]);

Route::apiResource("agencies", AgencyController::class);
Route::get("agencies/overview", [AgencyController::class, "overview"]);

Route::apiResource("body_styles", BodyStyle::class);
