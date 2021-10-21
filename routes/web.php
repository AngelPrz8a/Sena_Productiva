<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\ProgramaController;
//use App\Http\Controllers\LoginController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\EntregablesController;
use App\Http\Controllers\ReunionAprendizController;
use App\Http\Middleware\login;

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



//APRENDICES
Route::resource(
    'aprendices', AprendizController::class
);



//INSTRUCTORES
Route::resource(
    'instructores', InstructorController::class
);



//PROGRAMAS
Route::resource(
    'programas', ProgramaController::class
);
Route::get(
    'programas/habilitar/{id}', 'App\Http\Controllers\ProgramaController@habilitar'::class
);



//FICHAS
Route::resource(
    'fichas', FichaController::class
);



//USUARIOS
//CRUD
Route::resource(
    'usuarios', UsuarioController::class
);
//Modificar estado
Route::get(
    'usuarios/habilitar/{id}', 'App\Http\Controllers\UsuarioController@habilitar'::class
);
//verificar perfil
Route::get(
    'perfil', 'App\Http\Controllers\UsuarioController@perfil'::class
);
//ver perfil
Route::get(
    'perfil/{id}', 'App\Http\Controllers\UsuarioController@showPerfil'::class
);



//ENTREGABLES
//CRUD
Route::resource(
    'entregables', EntregablesController::class
);
//Modificar estado
Route::get('entregables/habilitar/{h}' , 'App\Http\Controllers\EntregablesController@habilitar'::class);



//EMPRESA
Route::resource('empresas', EmpresaController::class);

Route::get('empresas/aprendiz/{id}', [EmpresaController::class, 'aprendiz']);



//CENTROS
Route::resource(
    'centros', CentroController::class
);



//REUNION APRENDIZ
Route::resource(
    'reunionAprendiz', ReunionAprendizController::class
);
Route::get(
    'reunionAprendiz/habilitar/{id}', 'App\Http\Controllers\ReunionAprendizController@habilitar'::class
);



//Login
Route::get('login','App\Http\Controllers\LoginController@showLogin'::class)
->middleware('guest');

Route::post('login', 'App\Http\Controllers\LoginController@login'::class)
->middleware('guest');

Route::get('home', function(){
    return view('home.home')
    ->with('user', Auth::user())
    ->with('rol', Auth::user()->rol()->first()->tipoRol);
})->name('home')
->middleware('login');

Route::get('logout','App\Http\Controllers\LoginController@logout'::class)
->middleware('login');



//Landing
Route::get('Landing', function(){
    return view('Landing.Landing');
});


//////////////////////
