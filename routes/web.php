<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix("/admin")->group(function(){
    Route::get("/cadastrar-produto", [ProductsController::class, "create"])->name("products.create");
    Route::post("/salvar-produto", [ProductsController::class, "store"])->name("products.store");
    Route::get("/produtos", [ProductsController::class, "index"])->name("products.index");
    Route::get("/produto/{id}", [ProductsController::class, "show"])->name("products.show");
    Route::get("/editar-produto/{id}", [ProductsController::class, "edit"])->name("products.edit");
    Route::post("/atualizar-produto/{id}", [ProductsController::class, "update"])->name("products.update");
    Route::get("/deletar-produto/{id}", [ProductsController::class, "destroy"])->name("products.destroy");
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
