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

Route::get('categories', 'App\Http\Controllers\MediasController@getCategories');

Route::get('medias', 'App\Http\Controllers\MediasController@getAllMedias');
Route::get('oneMedia', 'App\Http\Controllers\MediasController@getOneMedia');

Route::get('addMedia', 'App\Http\Controllers\MediasController@formCreateMedia');
Route::post('addMedia', 'App\Http\Controllers\MediasController@createMedia');

Route::get('modifyMedia/{mediaId}', 'App\Http\Controllers\MediasController@formModifyMedia');
Route::put('modifyMedia/{mediaId}', 'App\Http\Controllers\MediasController@modifyMedia');

Route::delete('deleteMedia/{mediaId}', 'App\Http\Controllers\MediasController@deleteMedia');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
