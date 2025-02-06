<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
	return view('welcome', ['images' => \App\Models\Photo::take(10)->get()]);
});

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
	Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
	Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
	Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');
	Route::get('/albums/{album}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
	Route::patch('/albums/{album}', [AlbumController::class, 'update'])->name('albums.update');
	Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');

	Route::get('/photo', [PhotosController::class, 'index'])->name('photos.index');
	Route::get('/photo/upload/{album_id}', [PhotosController::class, 'create'])->name('photos.create');
	Route::post('/photo/upload', [PhotosController::class, 'store'])->name('photos.store');
	Route::delete('/photo/{photo}', [PhotosController::class, 'destroy'])->name('photos.destroy');
	Route::get('/photo/{photo}/edit', [PhotosController::class, 'edit'])->name('photos.edit');
	Route::patch('/photo/{photo}', [PhotosController::class, 'update'])->name('photos.update');
	Route::get('/photo/{photo}', [PhotosController::class, 'show'])->name('photos.show');

	Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
	Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

	Route::post('/like', [LikeController::class, 'store'])->name('like.store');
	Route::delete('/like/{like}', [LikeController::class, 'destroy'])->name('like.destroy');
});

require __DIR__.'/auth.php';
