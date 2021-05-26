<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\VecinoController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ViviendaController;
use App\Http\Controllers\VecinoViviendaController;
use App\Http\Controllers\AdministradorComunidadController;
use App\Http\Controllers\ReunionController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
Route::get('/',function(){
    return view('main-page');
});
*/
Route::get('/',[MainController::class,'raiz']) -> name('entrada');
Route::resource('vecinos',VecinoController::class);
Route::resource('comunidades',ComunidadController::class,['parameters'=>['comunidades'=>'comunidad']]);
Route::resource('administrators',AdministratorController::class);

Route::get('viviendas/listar/{comunidad}',[ViviendaController::class,'index'])-> name('verViviendas');
Route::get('viviendas/ver/{vivienda}/{direccion}',[ViviendaController::class,'show']) -> name('unaVivienda');
Route::get('viviendas/editar/{vivienda}',[ViviendaController::class,'edit']) -> name('editarViviendas');
Route::delete('viviendas/borrar/{vivienda}',[ViviendaController::class,'destroy']) -> name('borrarVivienda');
Route::get('viviendas/crear/{comunidad}',[ViviendaController::class,'create']) -> name('crearVivienda');
Route::post('viviendas/guardar/{comunidad}',[ViviendaController::class,'store']) ->name('viviendaGrabar');
Route::get('vecinosViviendas/listar/{vecino}',[VecinoViviendaController::class,'index']) -> name('verVecinoViviendas');
Route::get('vecinosViviendas/crear/{vecino_id}',[VecinoViviendaController::class,'create']) -> name('crearVecinoVivienda');
Route::post('vecinosViviendas/guardar',[VecinoViviendaController::class,'store']) ->name('vecinosViviendasGrabar');
Route::delete('vecinosViviendas/borrar/{id_vecinoVivienda}',[VecinoViviendaController::class,'destroy']) -> name('borrarVecinoVivienda');
Route::get('administradorComunidad/listar/{administrator}',[AdministradorComunidadController::class,'index']) -> name('verAdministradorComunidad');
Route::get('administradorComunidad/crear/{administrator_id}',[AdministradorComunidadController::class,'create']) -> name('crearAdministradorComunidad');
Route::post('administradorComunidad/guardar',[AdministradorComunidadController::class,'store']) ->name('administradorComunidadGrabar');
Route::delete('administradorComunidad/borrar/{id_administradorComunidad}',[AdministradorComunidadController::class,'destroy']) -> name('borrarAdministradorComunidad');
Route::get('reuniones',[ReunionController::class,'index']) -> name('reuniones');
Route::get('reuniones/crear/{comunidad_id}',[ReunionController::class,'create'])->name('crearReunion');
Route::post('reuniones/guardar',[ReunionController::class,'store'])->name('grabarReunion');