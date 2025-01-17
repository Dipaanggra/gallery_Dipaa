<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
    Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
    Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
    Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');

    Route::get('/photo', [PhotosController::class, 'index'])->name('photos.index');
    Route::get('/photo/upload/{album_id}', [PhotosController::class, 'create'])->name('photos.create');
    Route::post('/photo/upload', [PhotosController::class, 'store'])->name('photos.store');
    Route::get('/photo/{photo}', [PhotosController::class, 'show'])->name('photos.show');
    Route::delete('/photo/{photo}', [PhotosController::class, 'destroy'])->name('photos.destroy');
});

require __DIR__.'/auth.php';
