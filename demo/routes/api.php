<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;



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


## configure tokens

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});














