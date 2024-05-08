<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('posts/{post}', [PostsController::class, 'show'])->name('posts.show');

Route::get('posts/create', [PostsController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('posts/store', [PostsController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('posts/edit/{post}', [PostsController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('posts/update/{post}', [PostsController::class, 'update'])->name('posts.update')->middleware('auth');

Route::delete('posts/destroy/{post}', [PostsController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Route::post('posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store')->middleware('auth');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
