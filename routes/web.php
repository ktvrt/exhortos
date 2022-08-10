<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('usuario/lista', [UserController::class, 'index'])
    ->name('user.index');

//Metodo Get sirven para traer información
Route::get('usuario/nuevo', [UserController::class, 'create'])
    ->name('user.create');

//Metodo Post sirven para enviar información
Route::post('usuario/almacenar', [UserController::class, 'store'])
    ->name('user.store');

Route::get('usuario/detalles/{usuario}',[UserController::class, 'show'])
    ->where('usuario','[0-9]+')//le indicamos a este enrutador que se ejecute si son numeros los parametros
    ->name('user.show');
