<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Path: routes\web.php

Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::delete('/albums/{id}', [AlbumController::class, 'destroy'])->name('albums.destroy');

Route::get('/photo', [PhotosController::class, 'index']);
Route::get('/photo/upload/{album_id}', [PhotosController::class, 'create'])->name('photos.create');
Route::post('/photo/upload', [PhotosController::class, 'store'])->name('photos.store');
Route::get('/photo/{photo}', [PhotosController::class, 'show'])->name('photos.show');
Route::delete('/photo/{id}', [PhotosController::class, 'destroy'])->name('photos.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
