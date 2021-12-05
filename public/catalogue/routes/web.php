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

Route::get('medias', 'App\Http\Controllers\MediasController@getAllMedias');
Route::get('{userId}/medias', 'App\Http\Controllers\MediasController@getAllMediasPlaylists')->middleware('auth')->name('medias.show');
Route::post('{userId}/{playlistId}', 'App\Http\Controllers\PlaylistController@addMediaToPlaylist')->middleware('auth')->name('playlist.addMedia');

Route::get('films', 'App\Http\Controllers\MediasController@getAllFilms');
Route::get('{userId}/films', 'App\Http\Controllers\MediasController@getAllFilmsPlaylists')->middleware('auth')->name('films.show');

Route::get('series', 'App\Http\Controllers\MediasController@getAllSeries');
Route::get('{userId}/series', 'App\Http\Controllers\MediasController@getAllSeriesPlaylists')->middleware('auth')->name('series.show');

Route::get('search', 'App\Http\Controllers\SearchController@search');

Route::get('addMedia', 'App\Http\Controllers\MediasController@formCreateMedia')->middleware('auth');
Route::post('addMedia', 'App\Http\Controllers\MediasController@createMedia');

Route::get('modifyMedia/{mediaId}', 'App\Http\Controllers\MediasController@formModifyMedia');
Route::put('modifyMedia/{mediaId}', 'App\Http\Controllers\MediasController@modifyMedia');

Route::delete('deleteMedia/{mediaId}', 'App\Http\Controllers\MediasController@deleteMedia');

Route::get('medias/{id}', 'App\Http\Controllers\MediasController@getMediaDetails');
Route::get('{userID}/medias/{id}', 'App\Http\Controllers\MediasController@getMediaDetailsPlaylists')->middleware('auth')->name('medias.details');

Route::get('medias/{id}/comments', 'App\Http\Controllers\CommentsController@getMediaComments');
Route::post('medias/{id}/comments', 'App\Http\Controllers\CommentsController@postComment')->middleware('auth');
Route::delete('medias/{id}/comments', 'App\Http\Controllers\CommentsController@deleteComment')->middleware('auth');

Route::get('myPlaylists/{userId}', 'App\Http\Controllers\PlaylistController@getUserPlaylist')->middleware('auth');
Route::post('myPlaylists/{userId}', 'App\Http\Controllers\PlaylistController@createPlaylist')->middleware('auth')->name('playlist.add');
Route::delete('myPlaylists/{userId}', 'App\Http\Controllers\PlaylistController@deletePlaylist')->middleware('auth')->name('playlist.delete');
Route::post('myPlaylists/{userId}/{playlistId}', 'App\Http\Controllers\PlaylistController@dellMediaFromPlaylist')->middleware('auth')->name('playlist.removeMedia');

Route::get('playlistDetails/{playlistId}', 'App\Http\Controllers\PlaylistController@getPlaylistById')->middleware('auth')->name('playlist.details');

Route::get('playlistsPublic', 'App\Http\Controllers\PlaylistController@getAllPublicPlaylist')->middleware('auth')->name('playlist.public');

Route::get('person', 'App\Http\Controllers\PersonController@getAllPeople');
Route::get('person/{personId}', 'App\Http\Controllers\PersonController@getPersonDetails');

Route::get('addPerson', 'App\Http\Controllers\PersonController@formAddPerson')->middleware('auth');
Route::post('addPerson', 'App\Http\Controllers\PersonController@addPerson');

Route::get('modifyPerson/{personId}', 'App\Http\Controllers\PersonController@formModifyPerson');
Route::put('modifyPerson/{personId}', 'App\Http\Controllers\PersonController@modifyPerson');

Route::delete('deletePerson/{personId}', 'App\Http\Controllers\PersonController@deletePerson');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
