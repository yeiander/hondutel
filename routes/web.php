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
use App\Http\Controllers\atencionCliente\RegistroAveriaController;
use App\Models\RegistroAveria;
use App\Http\Controllers\atencionCliente\RegistroventaController;
use App\Http\Controllers\atencionCliente\RegistroCancelacionesController;
use App\Http\Controllers\atencionCliente\AveriaPendienteController;
use App\Http\Controllers\atencionCliente\RegistrolineaController;
use App\Http\Controllers\atencionCliente\RegistrowifiController;
use App\Http\Controllers\GoogleController;
use App\Models\Registrolinea;

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
Route::post('/recursos-humanos-permisos/administrativo/edit2', [PerAdministrativoController::class, 'edit2']);
Route::resource('/recursos-humanos-permisos/administrativo', PerAdministrativoController::class);
Route::resource('/recursos-humanos-permisos/administrativo-pendiente', PerAdminisPendienteController::class);
//_________________________________________PERMISO ADMINISTRATIVO (FINAL)______________________________________________________

//_________________________________________PERMISO VENTAS (INICIO)_________________________________________________________
Route::resource('/recursos-humanos-permisos/ventas-rc', PermisoVentasController::class);
Route::resource('/recursos-humanos-permisos/ventas-rc-pendiente', PerVentasPendienteController::class);
//_________________________________________PERMISO VENTAS (FINAL)_________________________________________________________

//_________________________________________MENU ATENCION AL CLIENTE (INICIO)_________________________________________________________
Route::get('/atencion-al-cliente/menu', [App\Http\Controllers\atencionCliente\MenuatencionclienteController::class, 'menuatencion'])->name('menu');
Route::get('/atencion-al-cliente/menu-registro-averia', [App\Http\Controllers\atencionCliente\MenuatencionclienteController::class, 'menuRegistroAveria'])->name('menu-registro-averia');
Route::resource('/atencion-al-cliente/registro-averia', RegistroAveriaController::class);
Route::get('/atencion-al-cliente/ventas/menu-ventas', [App\Http\Controllers\atencionCliente\MenuatencionclienteController::class, 'menuventas'])->name('menu-ventas');
Route::get('/atencion-al-cliente/cancelaciones/menu-cancelaciones', [App\Http\Controllers\atencionCliente\MenuatencionclienteController::class, 'menucancelaciones'])->name('menu-cancelaciones');
Route::resource('/atencion-al-cliente/ventas', RegistroventaController::class);
Route::resource('/atencion-al-cliente/cancelaciones', RegistrocancelacionesController::class);
Route::get('/atencion-al-cliente/cancelaciones/{id}/imprimir', [RegistroCancelacionesController::class, 'imprimir']);
Route::get('/atencion-al-cliente/ventas/{id}/imprimir', [RegistroventaController::class, 'imprimir']);
Route::get('/atencion-al-cliente/registro-averia/{id}/imprimir', [RegistroAveriaController::class, 'imprimir']);
Route::resource('/atencion-al-cliente/averia-pendiente', AveriaPendienteController::class);
Route::post('/atencion-al-cliente/ventas-linea/wifi123',[RegistrolineaController::class,'wifi123']);
Route::resource('/atencion-al-cliente/ventas-linea', RegistrolineaController::class);
Route::resource('/atencion-al-cliente/ventas-wifi', RegistrowifiController::class);
Route::get('/atencion-al-cliente/ventas-linea/{id}/imprimir', [RegistrolineaController::class, 'imprimir']);
//_________________________________________MENU ATENCION AL CLIENTE (FINAL)_________________________________________________________

//_________________________________________MAPA INTERACTIVO (INICIO)________________________________________________
Route::get('/mapa-interactivo/mapa-menu', [App\Http\Controllers\mapa\MapaMenuController::class, 'menuMapa'])->name('mapa-menu');
//_________________________________________MAPA INTERACTIVO (FINAL)________________________________________________