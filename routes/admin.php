<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;






Route::middleware(['auth:sanctum', 'verified'])->get('',[HomeController::class, 'index'])->middleware('can:admin.index')->name('admin.index');
Route::middleware(['auth:sanctum', 'verified'])->resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');
Route::middleware(['auth:sanctum', 'verified'])->resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::middleware(['auth:sanctum', 'verified'])->resource('tags', TagController::class)->except('show')->names('admin.tags');
Route::middleware(['auth:sanctum', 'verified'])->resource('posts', PostController::class)->except('show')->names('admin.posts');
