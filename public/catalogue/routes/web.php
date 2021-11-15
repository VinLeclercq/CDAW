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

Route::get('/', function () {
    return 'hello world :-)';
    // return view('welcome');
});

Route::get('/DeulePrime', function(){
    return view('template');
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

Route::get('/listeFilms', function(){
    return "Liste des films";
});
