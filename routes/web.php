<?php

use App\Http\Controllers\ModelController\FaccaoController;
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
Route::any('faccoes/search', 'ModelController\FaccaoController@search')->name('faccoes.search');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'ModelController\FaccaoController@index')->name('admin');

Route::middleware(['auth'])->group(function(){
    Route::resource('faccao', 'ModelController\FaccaoController');
    Route::resource('tarefa', 'ModelController\TarefaController');
    Route::resource('processo', 'ModelController\ProcessoController');
    Route::resource('modelo', 'ModelController\ModeloController');
    Route::resource('colecao', 'ModelController\ColecaoController');
});

Route::get('login', function () {
    return'login';
});

Route::get('/', function () {
    return view('iniciar.welcome');
});

Auth::routes();

