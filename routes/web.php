<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
    Route::get('/', function () {
        return view('welcome');
    });
*/


//Auth::routes();


//Rota de Autenticação
Route::get('/login', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallback');

//Rotas autenticadas
Route::get('/home', 'HomeController@index');
//Cadastro de Atividades
Route::get('/atividades','AtividadesExtrasController@index')->name('atividades');
Route::get('/atividades/create','AtividadesExtrasController@create')->name('atividades_create');
Route::post('/atividades/create','AtividadesExtrasController@store')->name('atividades_store');
Route::get('/atividades/update/{id}','AtividadesExtrasController@edit')->name('atividades_edit');
Route::post('/atividades/update/{id}','AtividadesExtrasController@update')->name('atividades_update');
Route::get('/atividades/show/{id}','AtividadesExtrasController@show')->name('atividades_show');
//Cadastro de Turmas
Route::get('/atividades/turma/create/{id}','AtividadesExtrasTurmasController@create')->name('turmas_create');
Route::post('/atividades/turma/create/{id}','AtividadesExtrasTurmasController@store')->name('turmas_store');
Route::get('/atividades/turma/show/{id}','AtividadesExtrasTurmasController@show')->name('turmas_show');
Route::get('/atividades/turma/update/{id}','AtividadesExtrasTurmasController@edit')->name('turmas_edit');
Route::post('/atividades/turma/update/{id}','AtividadesExtrasTurmasController@update')->name('turmas_update');
//Rotas de inscrições
Route::get('/inscricao', 'InscricaoController@index')->name('insc_index');
Route::post('/inscricao', 'InscricaoController@search')->name('insc_search');
Route::get('/inscricao/{ra}', 'InscricaoController@show')->name('insc_show');
Route::post('/inscricao/{ra}', 'InscricaoController@store')->name('insc_store');
//Controle de Usuários
Route::get('/usuarios', 'UserController@index')->name('user_index');
Route::post('/usuarios', 'UserController@store')->name('user_save');
Route::get('/usuarios/{id}', 'UserController@destroy')->name('user_destroy');