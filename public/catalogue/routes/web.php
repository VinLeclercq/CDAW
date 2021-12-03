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


use App\Models\Person;
use App\Models\Media;
use Illuminate\Http\Request;

Route::get('test', function (Request $request) {
    $className = $request->input("type");
    $query = $request->input("query");
    $class = "App\Models\\$className";
    return $class::search($query)->get();
});

Route::get('categories', 'App\Http\Controllers\CategoriesController@getCategories');

Route::get('medias', 'App\Http\Controllers\MediasController@getAllMedias')->name('medias');

Route::get('search', 'App\Http\Controllers\SearchController@search');

Route::get('addMedia', 'App\Http\Controllers\MediasController@formCreateMedia')->middleware('auth');
Route::post('addMedia', 'App\Http\Controllers\MediasController@createMedia');

Route::get('modifyMedia/{mediaId}', 'App\Http\Controllers\MediasController@formModifyMedia');
Route::put('modifyMedia/{mediaId}', 'App\Http\Controllers\MediasController@modifyMedia');

Route::delete('deleteMedia/{mediaId}', 'App\Http\Controllers\MediasController@deleteMedia');

Route::get('medias/{id}', 'App\Http\Controllers\MediasController@getMediaDetails');

Route::get('medias/{id}/comments', 'App\Http\Controllers\CommentsController@getMediaComments')->middleware('auth');
Route::post('medias/{id}/comments', 'App\Http\Controllers\CommentsController@postComment')->middleware('auth');
Route::delete('medias/{id}/comments', 'App\Http\Controllers\CommentsController@deleteComment')->middleware('auth');

Route::get('myPlaylists/{userId}', 'App\Http\Controllers\PlaylistController@getUserPlaylist')->middleware('auth');
Route::post('myPlaylists/{userId}', 'App\Http\Controllers\PlaylistController@createPlaylist')->middleware('auth')->name('playlist.add');
Route::delete('myPlaylists/{userId}', 'App\Http\Controllers\PlaylistController@deletePlaylist')->middleware('auth')->name('playlist.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
