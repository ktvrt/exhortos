<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;


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
    return view('auth.login');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

//Indicamos que estas acciones requiren Autenticado del usuario
Route::group(['middleware' => 'auth'], function(){
    Route::get('usuario/lista', [UserController::class, 'index'])
        ->name('user.index');
    //Metodo Get sirven para traer información
    Route::get('usuario/nuevo', [UserController::class, 'create'])
        ->name('user.create');
    //Metodo Post sirven para enviar información
    Route::post('usuario/almacenar', [UserController::class, 'store'])
        ->name('user.store');
    Route::get('usuario/{usuario}/detalles',[UserController::class, 'show'])
        ->where('usuario','[0-9]+')//le indicamos a este enrutador que se ejecute si son numeros los parametros
        ->name('user.show');
    Route::get('usuario/{usuario}/editar', [UserController::class, 'edit'])
        ->name('user.edit');
    //Metodo Put sirven para actualizar información
    Route::put('usuario/{usuario}/actualizar', [UserController::class, 'update'])
        ->name('user.update');
    //Metodo delete sirven para eliminar información
    Route::delete('usuario/{usuario}/eliminar', [UserController::class, 'destroy'])
        ->name('user.destroy');

    //automaticamente Genera las rutas del CRUD, es decil lo mismo de arriba
    Route::resource('permission', PermissionController::class);
    Route::resource('role',RoleController::class);
});
