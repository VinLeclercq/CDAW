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

Route::get('categories', 'App\Http\Controllers\listeMediasController@getCategories');

Route::get('films', 'App\Http\Controllers\listeMediasController@getAllFilms');
Route::get('oneFilm', 'App\Http\Controllers\listeMediasController@getOneFilm');

Route::get('addFilm', 'App\Http\Controllers\listeMediasController@formCreateFilm');
Route::post('addFilm', 'App\Http\Controllers\listeMediasController@createFilm');

Route::get('modifyFilm/{filmId}', 'App\Http\Controllers\listeMediasController@formModifyFilm');
Route::put('modifyFilm/{filmId}', 'App\Http\Controllers\listeMediasController@modifyFilm');

Route::delete('deleteFilm/{filmId}', 'App\Http\Controllers\listeMediasController@deleteFilm');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
