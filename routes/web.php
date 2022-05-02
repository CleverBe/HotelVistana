<?php

use App\Http\Livewire\AsignarController;
use App\Http\Livewire\HabitacionesController;
use App\Http\Livewire\InicioHotelController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\RolesController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/habitaciones', HabitacionesController::class)->name('habitacion');
    Route::get('/inicio', InicioHotelController::class)->name('inicio');
});
Route::get('roles', RolesController::class);
Route::get('permisos', PermisosController::class);
Route::get('asignar', AsignarController::class);
