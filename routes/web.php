<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\HomeController;
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
    Route::get('/create', [ProfesorController::class, 'create']);
    Route::get('/{id}/edit', [ProfesorController::class, 'edit']);
    Route::put('/', [ProfesorController::class, 'update']);
    Route::delete('/', [ProfesorController::class, 'destroy']);
    Route::get('/{id}/gafete', [ProfesorController::class, 'gafete']);
    Route::get('/tabla', [ProfesorController::class, 'tabla']);
    Route::get('/excel', [ProfesorController::class, 'excel']);
    Route::get('/mapa', function(){
        return view('mapa')->with('marcadores', [
            [23.738054845909193, -99.14820728542537],
            [23.748054845909193, -99.15820728542537],
            [23.758054845909193, -99.16820728542537],
            [23.768054845909193, -99.17820728542537],
            [23.778054845909193, -99.18820728542537],
            [23.788054845909193, -99.19820728542537],
            [23.798054845909193, -99.20820728542537],
            [23.808054845909193, -99.21820728542537],
        ]);
    });
    Route::post('/mapa', [ProfesorController::class, 'mapa']);
})->middleware(['auth', 'verified']);

Route::prefix('/materia')->group(function () {
    //Todo lo que esté aquí, va a agregar "/Materia" al principo
    Route::get('/', [MateriaController::class, 'index']);
    Route::post('/', [MateriaController::class, 'store']);
    Route::get('/{id}/edit', [MateriaController::class, 'edit']);
    Route::put('/', [MateriaController::class, 'update']);
    Route::get('/{id}/destroy', [MateriaController::class, 'destroy']);
})->middleware(['auth', 'verified']);

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
