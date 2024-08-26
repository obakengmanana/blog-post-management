<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Http\Controllers\PostController; // Import the PostController

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Redirect /home to /posts
Route::get('/home', function () {
    return redirect()->route('posts.index');
})->name('home');

// Resource route for posts
Route::resource('posts', PostController::class);

