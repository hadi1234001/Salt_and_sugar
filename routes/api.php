<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\LoginAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\SubTypeController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\Api\ChefController;
use App\Http\Controllers\Api\DistributorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//State
Route::apiResource('states', StateController::class);
//type
Route::apiResource('types', TypeController::class);
//sub-types
Route::apiResource('sub-types', SubTypeController::class);
//vehicles
Route::apiResource('vehicles', VehicleController::class);
//chefs
Route::apiResource('chefs', ChefController::class);
Route::post('/chefs/login', [ChefController::class, 'login']);
//distributors
Route::apiResource('distributors', DistributorController::class);
Route::post('distributors/login', [DistributorController::class, 'login']);
