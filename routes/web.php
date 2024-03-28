<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('view-course', function () {
    return view('manageCourse/viewListOfCourse');
});


Route::get('/add-course', function () {
    return view('manageCourse/addNewCourse');
})->name('newCourse');