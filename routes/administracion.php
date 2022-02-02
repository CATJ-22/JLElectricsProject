<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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


#rutas del modulo de administración
Route::group(['middleware' => ['auth']], function () {

  Route::prefix('Administracion')->group(function () {
    Route::get('/Home', [App\Http\Controllers\Administracion\AdministracionController::class, 'AdministracionHome'])->name('AdministracionHome');
    Route::get('/Inventario', [App\Http\Controllers\Administracion\AdministracionController::class, 'Inventario'])->name('Inventario');
  });

  //inventario
  Route::get('/Inventario/All', [App\Http\Controllers\Administracion\InventarioController::class, 'GetInventario']);
  Route::post('/Inventario/Save', [App\Http\Controllers\Administracion\InventarioController::class, 'SaveMaterialToInventario']);
  Route::put('/Inventario/Edit', [App\Http\Controllers\Administracion\InventarioController::class, 'SaveEditMaterial']);
  Route::delete('/Inventario/Delete/{materialId}', [App\Http\Controllers\Administracion\InventarioController::class, 'DeleteMaterial']);

});
