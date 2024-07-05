<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoCategoryController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {
    //  guest middleware
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
        Route::post('/authenticate', [AuthenticateController::class, 'authenticate'])->name('authenticate');
        Route::get('/register', [AuthenticateController::class, 'register'])->name('register');
        Route::post('/proccessRegister', [AuthenticateController::class, 'proccessRegister'])->name('proccessRegister');
    });
    //  auth middleware
    Route::group(['middleware' => 'auth'], function () {
        Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/todos', [TodoController::class, 'index'])->name('todos');
        Route::post('/todos/store', [TodoController::class, 'store'])->name('storeTodo');
        Route::post('/todos/update/{id}', [TodoController::class, 'update'])->name('updateTodo');
        Route::post('/todos/delete/{id}', [TodoController::class, 'destroy'])->name('deleteTodo');
        Route::get('/categories', [TodoCategoryController::class, 'index'])->name('categories');
        Route::post('/categories/store', [TodoCategoryController::class, 'store'])->name('storeCategory');
        Route::post('/categories/update/{id}', [TodoCategoryController::class, 'update'])->name('updateCategory');
        Route::post('/categories/delete/{id}', [TodoCategoryController::class, 'destroy'])->name('deleteCategory');
        Route::get('/lists', [TodoListController::class, 'index'])->name('lists');
        Route::post('/lists/store', [TodoListController::class, 'store'])->name('storeList');
        Route::post('/lists/update/{id}', [TodoListController::class, 'update'])->name('updateList');
        Route::post('/lists/delete/{id}', [TodoListController::class, 'destroy'])->name('deleteList');
        Route::get('/settings', [UserController::class, 'settings'])->name('settings');
        Route::post('/settings/update-photo', [UserController::class, 'updatePhoto'])->name('updatePhoto');
        Route::post('/settings/update-profile', [UserController::class, 'updateProfile'])->name('updateProfile');
        Route::post('/settings/update-password', [UserController::class, 'updatePassword'])->name('updatePassword');
        
    });
});
