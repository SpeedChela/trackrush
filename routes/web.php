<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AsignarRutaController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EntidadController;
use App\Http\Controllers\EstatusController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\ModeradorController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;

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

// Rutas básicas
Route::get('/', function () {
    return view('template.master');
});

Route::get('inicio', function () {
    return view('inicio_vista');
});

Route::get('usa_control',[InicioController::class, 'usa_control_1']);

Route::get('usa_control_y_param/{var}', [InicioController::class, 'usa_control_y_param_1']);

// Rutas de los controladores
Route::resource('asignar_ruta', AsignarRutaController::class);
Route::resource('bodegas', BodegaController::class);
Route::resource('drivers', DriverController::class);
Route::resource('entidades', EntidadController::class);
Route::resource('estatus', EstatusController::class);
Route::resource('historico', HistoricoController::class);
Route::resource('moderadores', ModeradorController::class);
Route::resource('municipios', MunicipioController::class);
Route::resource('paises', PaisController::class);
Route::resource('paquetes', PaqueteController::class);
Route::resource('roles', RolController::class);
Route::resource('rutas', RutaController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('vehiculos', VehiculoController::class);