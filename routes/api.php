<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Models\Agency;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("cars", CarController::class);
Route::get("cars/overview", [CarController::class, "overview"]);

Route::apiResource("agencies", AgencyController::class);
Route::apiResource("categories", CategoryController::class);
