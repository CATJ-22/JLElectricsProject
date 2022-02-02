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

Route::get('/', function () {
	// DB::table('users')->insert(["usuario"=>"jlelectric", "password"=>Hash::make("123456"), "role"=>"admin"]);
	return view('welcome');
})->name('welcome');

Route::get('/Logout', [App\Http\Controllers\AuthController::class, 'Logout'])->name('logout');
Route::post('/Login', [App\Http\Controllers\AuthController::class, 'Login']);

Route::group(['middleware' => ['auth']], function () {
Route::get('/Menu', [App\Http\Controllers\MenuController::class, 'Menu'])->name('Menu');
});
