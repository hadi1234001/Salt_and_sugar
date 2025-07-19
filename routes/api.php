<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\LoginAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\SubTypeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//State
Route::apiResource('states', StateController::class);
//type
Route::apiResource('types', TypeController::class);
//
Route::apiResource('sub-types', SubTypeController::class);
