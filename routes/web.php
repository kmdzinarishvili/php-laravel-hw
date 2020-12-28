<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {

    $response = Http::withToken('token')->post("http://example.com/users", [
        "name" => "keti",
        "role" => "network administrator"
    ]);

    if ($response->successful()){
        return $response;
    }
    return $response->status();



});


//Auth::routes();

Route::get('/home', [\App\Http\Controllers\UserController::class, "index"])->name("home");

Route::get('users/create', [\App\Http\Controllers\UserController::class, "create"])->name("users.create");

Route::post('users/store', [\App\Http\Controllers\UserController::class, "store"])->name("users.store");

Route::get('users/show', [\App\Http\Controllers\UserController::class, "show"])->name("users.show");
