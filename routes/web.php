<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/', [HomeController::class, '__invoke'])->name('home');

Route::controller(UserController::class)->group(function () {
    Route::post('/auth', 'login')->name('Login.User');
    Route::post('/log', 'logout')->name('Logout.User');
});

//
//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(PostController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/my', 'index')->name('myPosts');
    Route::post('/create', 'store')->name('createPost');
    Route::patch('/post/{id}', 'update')->name('updatePost');
    Route::delete('/post/{id}', 'destroy')->name('deletePost');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Breeze (переписан логин и взаимодействие с почтой)
require __DIR__.'/auth.php';
