<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\CorreoMailable;
use Illuminate\Support\Facades\Mail;  

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
Route::delete('/home/{id}', [App\Http\Controllers\TareasController::class, 'eliminarTarea'])->name('tarea.destroy');
Route::get('/home/ver/{id}', [App\Http\Controllers\TareasController::class, 'verTarea'])->name('verTarea');
Route::post('/home/editar/{id}', [App\Http\Controllers\TareasController::class, 'editarTarea'])->name('editarTarea');
Route::post('/home/addComment', [App\Http\Controllers\TareasController::class, 'addComment'])->name('addComment');

Route::get('/home/proyectos', [App\Http\Controllers\ProyectosController::class, 'index'])->name('proyectos');
Route::post('/home/crearProyecto', [App\Http\Controllers\ProyectosController::class, 'crearProyecto'])->name('crearProyecto');
Route::get('/home/enviarInvitacion', [App\Http\Controllers\ProyectosController::class, 'enviarInvitacion'])->name('enviarInvitacion');
Route::delete('/home/proyectos/{id}', [App\Http\Controllers\ProyectosController::class, 'eliminarProyecto'])->name('proyecto.destroy');
Route::get('/home/proyectos/ver/{id}', [App\Http\Controllers\ProyectosController::class, 'verProyecto'])->name('verProyecto');
Route::post('/home/proyectos/editar/{id}', [App\Http\Controllers\ProyectosController::class, 'editarProyecto'])->name('editarProyecto');
Route::post('/home/proyectos/addComment', [App\Http\Controllers\ProyectosController::class, 'addCommentProject'])->name('addCommentProject');




Route::get('send', 'App\Http\Controllers\MailParametrizado@send');
