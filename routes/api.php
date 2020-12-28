<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/login", [\App\Http\Controllers\ApiController::class, "login"])->name("api.users.login");

Route::middleware(['auth:api'])->group(function(){
    Route::get("/users", [\App\Http\Controllers\UserController::class, "index"])->name("api.users.index");
    Route::get("/users/{user}", [\App\Http\Controllers\UserController::class, "show"])->name("api.users.show");
});
