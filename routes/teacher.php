<?php

use App\Http\Controllers\Teacher\CourseController;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'courses');
Route::resource('courses', CourseController::class)->names('courses');
