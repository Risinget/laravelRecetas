<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecetaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route::get('/recetas', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::apiResource('/recetas', HomeController::class);

Route::get('/recetas',[RecetaController::class, 'index'])->name('recetas.index');
Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');