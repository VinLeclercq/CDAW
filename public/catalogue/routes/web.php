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

Route::get('categories', 'App\Http\Controllers\CategoriesController@getCategories');

Route::get('medias', 'App\Http\Controllers\MediasController@getAllMedias')->name('medias');

Route::get('addMedia', 'App\Http\Controllers\MediasController@formCreateMedia')->middleware('auth');
Route::post('addMedia', 'App\Http\Controllers\MediasController@createMedia');

Route::get('modifyMedia/{mediaId}', 'App\Http\Controllers\MediasController@formModifyMedia');
Route::put('modifyMedia/{mediaId}', 'App\Http\Controllers\MediasController@modifyMedia');

Route::delete('deleteMedia/{mediaId}', 'App\Http\Controllers\MediasController@deleteMedia');

Route::get('medias/{id}', 'App\Http\Controllers\MediasController@getMediaDetails');

Route::get('medias/{id}/comments', 'App\Http\Controllers\CommentsController@getMediaComments');
Route::post('medias/{id}/comments', 'App\Http\Controllers\CommentsController@postComment')->middleware('auth');
Route::delete('medias/{id}/comments', 'App\Http\Controllers\CommentsController@deleteComment');

Route::get('myPlaylists/{userId}', 'App\Http\Controllers\PlaylistController@getCategories');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
