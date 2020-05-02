<?php

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

Route::middleware([])->group(function(){
    Route::prefix('adicionar')->group(function(){
        Route::get('/colecao', function(){
            return 'colecao';
        });
        Route::get('/modelo', function(){
            return 'modelo';
        }); 
        Route::get('/processo', function(){
            return 'processo';
        });
        Route::get('/tarefa', function(){
            return 'tarefa';
        });
        Route::get('/usuario', function(){
            return 'usuario';
        });
        Route::redirect('/', view('iniciar.welcome'));
    });
});

Route::get('/', function () {
    return view('iniciar.welcome');
});
