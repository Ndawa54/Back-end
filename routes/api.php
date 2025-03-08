<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\search;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', 'App\Http\Controllers\UserController');
Route::resource('singles', 'App\Http\Controllers\SingleController')->except(['create','edit']);
Route::resource('albums', 'App\Http\Controllers\AlbumController')->except(['create','edit']);
Route::resource('artist', 'App\Http\Controllers\ArtistController')->except(['create','edit']);
Route::resource('songs', 'App\Http\Controllers\SongController')->except(['create','edit']);
Route::resource('pesticides', 'App\Http\Controllers\PesticideController');
Route::resource('notifications', 'App\Http\Controllers\NotificationController');
Route::resource('criticals', 'App\Http\Controllers\CriticalController');
Route::resource('logins', 'App\Http\Controllers\LoginController');
Route::get('multiSearch', 'App\Http\Controllers\SearchController@multiSearch');
Route::get('/search/{query}',[AlbumController::class,'search']);
Route::get('/songSearch/{query}',[SingleController::class,'songSearch']);
Route::get('/download/{filename}', [SingleController::class, 'download'])->where('filename', '.*');
// In routes/api.php
Route::get('/notification-counts', [NotificationController::class, 'getCounts']);
