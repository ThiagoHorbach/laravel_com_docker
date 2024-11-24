<?php

use App\Http\Controllers\ApiProductsController;
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


Route::get("/product", [ApiProductsController::class, "index"]);
Route::post("/product", [ApiProductsController::class, "store"]);
Route::put("/product/{id}", [ApiProductsController::class, "update"]);
Route::delete("/product/{id}", [ApiProductsController::class, "destroy"]);
