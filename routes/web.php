<?php

use Illuminate\Support\Facades\Route;
//agregue los controladores necesarios para las rutas
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\rhumanos\PaseSalidaController;
use App\Http\Controllers\rhumanos\PaseSalidaAdminController;
use App\Http\Controllers\rhumanos\PaseSalidaPendienteController;
use App\Http\Controllers\rhumanos\PermisoPersonalPendienteController;
use App\Http\Controllers\rhumanos\PermisoPersonalController;
use App\Http\Controllers\rhumanos\PerAdministrativoController;
use App\Http\Controllers\rhumanos\PerAdminisPendienteController;
use App\Http\Controllers\rhumanos\PermisoVentasController;
use App\Http\Controllers\rhumanos\PerVentasPendienteController;
use App\Models\RhPermiso;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para la autorizacion de usuarios:
Route::group(['middleware'=>['auth']], function(){
      Route::resource('roles', RolController::class);
      Route::resource('usuarios', UsuarioController::class);
      Route::resource('tareas', TareaController::class);
});

//vista de la parte principal de recursos humanos
Route::get('/recursos_humanos', [App\Http\Controllers\rhumanos\RecursoshumanosController::class, 'index'])->name('recursos_humanos');

//vista de la parte principal de tipos de permisos recursos humanos
Route::get('/rc/recursos-h-tipos-de-permisos', [App\Http\Controllers\rhumanos\RecursoshumanosController::class, 'permisos'])->name('recursos-h-tipos-de-permisos');
//vista de la parte principal de tipos de permisos recursos humanos
Route::get('/rc/recursos-humanos-consultas', [App\Http\Controllers\rhumanos\RecursoshumanosController::class, 'consultas'])->name('recursos-humanos-consultas');

//_________________________________________PASE DE SALIDA (INICO)__________________________________________________________
Route::post('/recursos-humanos-permisos/pase-salida/edit2', [PaseSalidaController::class, 'edit2']);
Route::get('/recursos-humanos-permisos/pase-salida/{id}/imprimir', [PaseSalidaController::class, 'imprimir']);
Route::resource('/recursos-humanos-permisos/pase-salida', PaseSalidaController::class);
Route::resource('/recursos-humanos-permisos/pase-salida-admin', PaseSalidaAdminController::class);
Route::resource('/recursos-humanos-permisos/pase-salida-pendiente', PaseSalidaPendienteController::class);
//_________________________________________PASE DE SALIDA (FINAL)________________________________________________________

//_________________________________________PERMISO PERSONAL (INICIO)_______________________________________________________
Route::resource('/recursos-humanos-permisos/permiso-personal', PermisoPersonalController::class);
Route::resource('/recursos-humanos-permisos/p-personal-pendiente', PermisoPersonalPendienteController::class);
//_________________________________________PERMISO PERSONAL (FINAL)______________________________________________________

//_________________________________________PERMISO ADMINISTRATIVO (INICIO)________________________________________________
Route::resource('/recursos-humanos-permisos/administrativo', PerAdministrativoController::class);
Route::resource('/recursos-humanos-permisos/administrativo-pendiente', PerAdminisPendienteController::class);
//_________________________________________PERMISO ADMINISTRATIVO (FINAL)______________________________________________________

//_________________________________________PERMISO VENTAS (INICIO)_________________________________________________________
Route::resource('/recursos-humanos-permisos/ventas-rc', PermisoVentasController::class);
Route::resource('/recursos-humanos-permisos/ventas-rc-pendiente', PerVentasPendienteController::class);
//_________________________________________PERMISO VENTAS (FINAL)_________________________________________________________

