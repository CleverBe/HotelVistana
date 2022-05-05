<?php

use App\Http\Controllers\ExportReservasPdfController;
use App\Http\Livewire\AsignarController;
use App\Http\Livewire\HabitacionesController;
use App\Http\Livewire\InicioHotelController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\ReporteReservasController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\UsersController;
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

Route::get('reporteDeReservas', ReporteReservasController::class);
Route::get('reporteReservas/pdf/{user}/{type}/{f1}/{f2}', [ExportReservasPdfController::class, 'reportPDF']);
Route::get('reporteGananciaTigoM/pdf/{user}/{type}', [ExportReservasPdfController::class, 'reportPDF']);
Route::get('users', UsersController::class);
