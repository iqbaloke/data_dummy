<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('user', [UserController::class, 'index']);

Route::get('post', [PostController::class, 'index']);
