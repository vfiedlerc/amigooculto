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
*/

Route::get('/','LandController@inicio');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/efetuasorteio','ResultadoController@doSort')->name('sorteio.efetua');
Route::get('/sorteio/{id}/','SorteioController@show')->name('sorteio.exibe');
Route::get('/meussorteios','SorteioController@index')->name('sorteio.meus');
Route::post('/addpres','PresenteController@store')->name('home.addpres');
Route::get('/cadastar','SorteioController@create')->name('sorteio.inicio');
Route::post('/cadastrar','SorteioController@store')->name('sorteio.store');

Route::get('/addpart','ParticipanteController@create')->name('part.addpart');
Route::post('/addpart','ParticipanteController@store')->name('part.storepart');