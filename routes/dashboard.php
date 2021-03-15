<?php

use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware('can:view-dashboard')->name('index');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('users');
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');
Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');
Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');
