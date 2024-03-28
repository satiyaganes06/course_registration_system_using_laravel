<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('view-course', [CourseController::class, 'viewCoursesList'])->name('viewCoursesList');


Route::get('/add-course', function () {
    return view('manageCourse/addNewCourse');
})->name('newCourse');

Route::post('/add-course', [CourseController::class, 'createCourse'])->name('createCourse');