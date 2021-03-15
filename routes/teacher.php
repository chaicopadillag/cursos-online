<?php

use App\Http\Controllers\Teacher\CourseController;
use App\Http\Livewire\Teacher\CourseCurriculum;
use App\Http\Livewire\Teacher\CourseStudents;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'courses');
Route::resource('courses', CourseController::class)->names('courses');
Route::get('courses/{course}/curriculum', CourseCurriculum::class)->middleware('can:update-course')->name('courses.curriculum');
Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');
Route::get('courses/{course}/students', CourseStudents::class)->middleware('can:update-course')->name('courses.students');
Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');
Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');
