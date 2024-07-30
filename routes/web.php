<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Login
Route::GET('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::POST('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::GET('/auth/registration', [AuthController::class, 'registrasi'])->name('auth.registration');
Route::POST('/auth/signup', [AuthController::class, 'signup'])->name('auth.signup');
Route::POST('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Guest
Route::GET('/', [PostController::class, 'index'])->name('post');

// Route yang dilindungi oleh middleware auth
Route::middleware('auth')->group(function () {
    // Post
    Route::GET('/index', [PostController::class, 'index'])->name('post.index');
    Route::POST('/store', [PostController::class, 'store'])->name('post.store');
    Route::DELETE('/store/delete/{id}', [PostController::class, 'delete'])->name('post.delete');

    // Profile
    Route::GET('/profile{id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::GET('/profile/singgah/{id}', [ProfileController::class, 'indexSinggah'])->name('profile.indexSinggah');
    Route::GET('/profile/edit/{id}', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::PUT('/profile/update/{id}', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::DELETE('/profile/post/delete/{id}', [ProfileController::class, 'delete'])->name('profile.deletePost');
    Route::GET('/profile/post/edit/{id}', [ProfileController::class, 'edit'])->name('profile.editPost');
    Route::PUT('/profile/post/update/{id}', [ProfileController::class, 'update'])->name('profile.updatePost');
});

