<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\MateriaController;
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

Route::get('/alumno', function () {
    dd("Hola, estas entrando a la vista de alumno");
})->middleware(['auth', 'verified']);

Route::prefix('/profesor')->group(function () {
    //Todo lo que esté aquí, va a agregar "/profesor" al principo
    Route::get('/', [ProfesorController::class, 'index']);
    Route::post('/', [ProfesorController::class, 'store']);
})->middleware(['auth', 'verified']);

Route::prefix('/materia')->group(function () {
    //Todo lo que esté aquí, va a agregar "/Materia" al principo
    Route::get('/', [MateriaController::class, 'index']);
    Route::post('/', [MateriaController::class, 'store']);
    Route::get('/{id}/edit', [MateriaController::class, 'edit']);
    Route::put('/', [MateriaController::class, 'update']);
    Route::get('/{id}/destroy', [MateriaController::class, 'destroy']);
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
