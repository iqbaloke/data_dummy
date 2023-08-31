<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('user', [UserController::class, 'index']);

Route::get('post', [PostController::class, 'index']);
Route::get('post/{post:slug}', [PostController::class, 'show']);
Route::post('post/', [PostController::class, 'store']);
Route::patch('post/{post:slug}', [PostController::class, 'update']);
Route::delete('post/{post:slug}', [PostController::class, 'destroy']);
