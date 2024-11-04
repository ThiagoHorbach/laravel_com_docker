<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get("/cadastrar-produto", [ProductsController::class, "create"]);

Route::get("/teste/{teste}", [ExampleController::class, "testeLaravel"]);