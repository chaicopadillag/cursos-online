<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CourseLearning;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');
Route::get('curso/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');
Route::get('curso/{course}/inscrito', CourseLearning::class)->middleware('auth')->name('courses.learning');
