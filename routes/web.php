<?php

use App\Http\Middleware\login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
//use App\Http\Controllers\LoginController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\EntregablesController;
use App\Http\Controllers\ReunionAprendizController;

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
    return view('Landing.Landing');
})
->middleware('guest');



//plantilla
Route::get('plantilla', function(){
    return view('plantilla.plantilla');
})
->middleware('login');



//APRENDICES
Route::resource(
    'aprendices', AprendizController::class
)
->middleware('login');



//INSTRUCTORES
Route::resource('instructores', InstructorController::class)->middleware('login');

Route::get('instructores/{id}/asignar',[InstructorController::class, 'asignar'])->middleware('login');
Route::post('instructores/{id_ficha}/desasignar', [InstructorController::class, 'desasignar'])->middleware('login');



//PROGRAMAS
Route::resource(
    'programas', ProgramaController::class
)
->middleware('login');
Route::get(
    'programas/habilitar/{id}', 'App\Http\Controllers\ProgramaController@habilitar'::class
)
->middleware('login');



//FICHAS
Route::resource('fichas', FichaController::class)->middleware('login');
Route::get('fichas/{id}/aprendices', [FichaController::class, 'aprendices']);


//USUARIOS
//CRUD
Route::resource(
    'usuarios', UsuarioController::class
)
->middleware('login');
//Modificar estado
Route::get(
    'usuarios/habilitar/{id}', 'App\Http\Controllers\UsuarioController@habilitar'::class
)
->middleware('login');
//ver perfil
Route::get('perfil', 'App\Http\Controllers\UsuarioController@perfil'::class)
->middleware('login');




//ENTREGABLES
//CRUD
Route::resource('entregables', EntregablesController::class)->middleware('login');
//Modificar estado
Route::get('entregables/habilitar/{h}' , 'App\Http\Controllers\EntregablesController@habilitar'::class)
->middleware('login');



//EMPRESA
Route::resource('empresas', EmpresaController::class)
->middleware('login');

Route::get('empresas/aprendiz/{id}', [EmpresaController::class, 'aprendiz'])
->middleware('login');


//CENTROS
Route::resource(
    'centros', CentroController::class
)
->middleware('login');



//REUNION APRENDIZ
Route::resource('reunionAprendiz', ReunionAprendizController::class)->middleware('login');
Route::get('reunionAprendiz/mostrar', [ReunionAprendizController::class, 'show'])->middleware('login');
Route::post('reunionAprendiz/{id}', [ReunionAprendizController::class, 'edit'])->middleware('login');
Route::post('reunionAprendiz/{id}/edit', [ReunionAprendizController::class, 'update'])->middleware('login');
Route::post('reunionAprendiz/{id}/delete', [ReunionAprendizController::class, 'destroy'])->middleware('login');
Route::get('reunionAprendiz/{id}/habilitar', 'App\Http\Controllers\ReunionAprendizController@habilitar'::class)->middleware('login');

//////////////////////////////////////



//Login
Route::get('login','App\Http\Controllers\LoginController@showLogin'::class)
->middleware('guest');

Route::post('login', 'App\Http\Controllers\LoginController@login'::class)
->middleware('guest');

Route::get('home', function(){
    return view('home.home');
})->name('home')
->middleware('login');

Route::get('logout','App\Http\Controllers\LoginController@logout'::class)
->middleware('login');
Route::post('logout','App\Http\Controllers\LoginController@logout'::class)
->middleware('login');



//Landing
Route::get('Landing', function(){
    return view('Landing.Landing');
})
->middleware('guest');


//////////////////////
