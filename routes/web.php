<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\VecinoController;
use App\Http\Controllers\ComunidadController;

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