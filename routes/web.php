<?php

use App\Http\Controllers\AlbumController;
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
