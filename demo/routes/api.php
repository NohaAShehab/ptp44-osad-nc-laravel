<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


# here I will add all the api routes I need
# routes in this file can be accessed using prefix --> api

Route::get("/hi", function (Request $request) {
    return "Hi";
});

# I need to create api routes and functionalities for action on model Student

Route::apiResource("students",StudentController::class);
