<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\TareasController::class, 'index'])->name('home');
Route::post('/home/crearTarea', [App\Http\Controllers\TareasController::class, 'crearTarea'])->name('crearTarea');
Route::post('/home/crearProyecto', [App\Http\Controllers\TareasController::class, 'crearProyecto'])->name('crearProyecto');
Route::delete('/home/{id}', [App\Http\Controllers\TareasController::class, 'eliminarTarea'])->name('tarea.destroy');

