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

Route::get('/listeMedias', 'App\Http\Controllers\listeMediasController@getListeMedias');
Route::get('/{type}/{annee}', 'App\Http\Controllers\listeMediasController@getListeMediasWithParameters');

Route::get('categories', 'App\Http\Controllers\listeMediasController@getCategories');

Route::get('films', 'App\Http\Controllers\listeMediasController@getAllFilms');
Route::get('oneFilm', 'App\Http\Controllers\listeMediasController@getOneFilm');

Route::get('addFilm', 'App\Http\Controllers\listeMediasController@formCreateFilm');
Route::post('addFilm', 'App\Http\Controllers\listeMediasController@createFilm');

Route::get('modifyFilm/{filmId}', 'App\Http\Controllers\listeMediasController@formModifyFilm');
Route::put('modifyFilm/{filmId}', 'App\Http\Controllers\listeMediasController@modifyFilm');

Route::delete('deleteFilm', 'App\Http\Controllers\listeMediasController@deleteFilm');

Route::get('/', function () {
    return 'hello world :-)';
    // return view('welcome');
});

Route::get('/DeulePrime', function(){
    return view('template');
});

Route::get('/listeFilms', function(){
    return view('listeMedias');
});

Route::get('/{name}/{forname}', function($name, $forname){
    return 'bonjour '.$name.' '.$forname;
});

Route::get('/foPaFer', function(){
    echo('<!doctype html>
    <html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Mauvaise façon</title>
    </head>
    <body>
    <p>Le fichier risque d être longggggg</p>
    </body>
    </html>') ;
});

Route::get('/{title}', function($title){
    return $title;
})->whereAlpha('title');
