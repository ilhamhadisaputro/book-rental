<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProses']);       
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::middleware('only_client')->group(function(){
        Route::get('profile', [UserController::class, 'profile']);
    });

    
    Route::middleware('only_admin')->group(function(){

        Route::get('dasboard', [DasboardController::class, 'index']);

        Route::get('books', [BookController::class, 'index']);
        Route::get('books_add', [BookController::class, 'add']);
        Route::post('books_add', [BookController::class, 'store']);
        Route::get('book_edit/{slug}',[BookController::class, 'edit']);
        Route::post('book_edit/{slug}', [BookController::class, 'update']);
        Route::get('book_delete/{slug}', [BookController::class, 'delete']);
        Route::get('book_destroy/{slug}', [BookController::class, 'destroy']);
        Route::get('book_deleted', [BookController::class, 'delete_book']);
        Route::get('book_restore/{slug}', [BookController::class, 'restore']);
    
        
        Route::get('category', [CategoryController::class, 'index']);
        Route::get('category_add', [CategoryController::class, 'add']);
        Route::post('category_add', [CategoryController::class, 'store']);
        Route::get('category_edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category_edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category_delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category_destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category_deleted', [CategoryController::class, 'category_deleted']);
        Route::get('category_restore/{slug}', [CategoryController::class, 'restore']);
    
        Route::get('user', [UserController::class, 'index']);
        Route::get('registered_users', [UserController::class, 'registeredUsers']);
        Route::get('user_detail/{slug}', [UserController::class, 'show']);
        Route::get('user_approve/{slug}', [UserController::class, 'approve']);
        Route::get('user_ban/{slug}', [UserController::class, 'delete']);
        Route::get('user_destroy/{slug}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('user_banned', [UserController::class, 'banned_user']);
        Route::get('user_restore/{slug}', [UserController::class, 'restore']);
        
    });
    Route::get('rent_logs', [RentLogsController::class, 'index']);
});
