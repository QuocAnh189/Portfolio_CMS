<?php

use App\Http\Controllers\Api\UserInformationController;
use App\Http\Controllers\Api\UserProjectController;
use App\Http\Controllers\Api\UserTechnologiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/users/get-profile/{user}', [UserInformationController::class, 'index']);
Route::get('/users/get-technologies/{user}', [UserTechnologiesController::class, 'index']);
Route::get('/users/get-projects/{user}', [UserProjectController::class, 'index']);
