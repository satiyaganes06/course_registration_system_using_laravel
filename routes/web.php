<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth;


Route::get('/', function () {
    return view('manageUserAuth/login');
})->name('getloginpage');

Route::post('/login', [Auth::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('manageUserAuth/register');
})->name('register');



Route::post('/register', [Auth::class, 'register'])->name('register');

Route::get('/logout', [Auth::class, 'logout'])->name('logout');

Route::get('view-course', [CourseController::class, 'viewCoursesList'])->name('viewCoursesList')->middleware('auth');


Route::get('/add-course', function () {
    return view('manageCourse/addNewCourse');
})->name('newCourse');

Route::post('/add-course', [CourseController::class, 'createCourse'])->name('createCourse');