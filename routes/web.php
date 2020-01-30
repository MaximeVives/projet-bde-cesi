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
// création des routes qui redirigent sur les fonctions du controleur
Route::get('/','FullController@accueil' )->name('accueil');
Route::get('/boutique','FullController@boutique' )->name('boutique');
Route::get('/panier','FullController@panier' )->name('panier')->middleware('auth');
Route::get('/inscription','FullController@inscription' )->name('inscription');
Route::get('/connexion','FullController@connexion' )->name('connexion');
Route::get('/mentions_legales','FullController@mentions_legales' )->name('mentions_legales');
Route::get('/cgv','FullController@cgv' )->name('cgv');
Route::get('/evenement','FullController@evenement' )->name('evenement');
Route::get('/send-data','FullController@sendData' )->name('send-data');

Route::group(['prefix' => 'admin'], function(){
  Route::get('/boutique','FullController@aboutique' )->name('aboutique')->middleware('auth');
  Route::post('/boutique','FullController@aboutique' )->name('aboutique')->middleware('auth');
	Route::post('/evenement','FullController@aevenement' )->name('aevenement')->middleware('auth');
  Route::get('/evenement','FullController@aevenement' )->name('aevenement')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
