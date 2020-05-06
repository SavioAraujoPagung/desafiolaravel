<?php

use App\Http\Controllers\Model\UsuarioController;
use Illuminate\Support\Facades\Route;

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
Route::any('tarefas/search', 'ModelController\TarefaController@search')->name('tarefas.search');
//Route::middleware([''])->group(function(){
    Route::resource('usuario', 'ModelController\UsuarioController');
    Route::resource('tarefa', 'ModelController\TarefaController');
    Route::resource('processo', 'ModelController\ProcessoController');
    Route::resource('modelo', 'ModelController\ModeloController');
    Route::resource('colecao', 'ModelController\ColecaoController');
//});

Route::get('login', function () {
    return'login';
});

Route::get('/', function () {
    return view('iniciar.welcome');
});
