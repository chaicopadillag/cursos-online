<?php

use App\Http\Controllers\Teacher\CourseController;
use App\Http\Livewire\Teacher\CourseCurriculum;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'courses');
Route::resource('courses', CourseController::class)->names('courses');
Route::get('courses/{course}/curriculum', CourseCurriculum::class)->name('courses.curriculum');
