<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('/activiteiten', 'ActiviteitenController');
Route::get('aciviteiten/export/', 'ActiviteitenController@export')->name('export');

Route::resource('/jongeren', 'JongerenController');
Route::get('/export/', 'JongerenController@export')->name('jongeren.export');

Route::resource('/koppel', 'KoppelController');
Route::get('/export/', 'KoppelController@export')->name('koppel.export');
