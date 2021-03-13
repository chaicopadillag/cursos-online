<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware('can:view-dashboard')->name('index');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('users');
