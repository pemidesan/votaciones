<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\VecinoController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ViviendaController;

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
