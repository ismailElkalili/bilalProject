<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard_layout\dashboard_main');
})->middleware('auth');

Route::controller(CommitteeController::class)->middleware('auth')->group(function () {
    Route::get('/committees/create', 'create');
    Route::post('/committees/store', 'store');
    Route::get('/committees', 'index');
    Route::get('/committees/edit/{committeesID}', 'edit');
    Route::post('/committees/update/{committeesID}', 'update');

});

Route::controller(TeacherController::class)->middleware('auth')->group(function () {
    Route::get('/teacher', 'index');
    Route::get('/teacher/create', 'create');
    Route::post('/teacher/store', 'store');
    Route::post('/teacher/update', 'update');
    Route::get('/teacher/edit/{id}', 'edit');
    // Route::post('/teacher/destroy/{id}', 'destroy');
    Route::get('/teacher/show/{id}', 'show');

});

Route::controller(StudentController::class)->middleware('auth')->group(function () {
    Route::get('/student', 'index');
    Route::get('/student/create', 'create');
    Route::post('/student/store', 'store');
    Route::get('/student/edit/{studentID}', 'edit');
    Route::post('/student/update/{studentID}', 'update');
    Route::get('/student/{studentID}', 'show');
});

Route::controller(DepartmentController::class)->middleware('auth')->group(function () {
    Route::get('/departments/create', 'create');
    Route::post('/departments/store', 'store');
    Route::get('/departments/index', 'index');
    Route::get('/departments/edit/{departmentID}', 'edit');
    Route::post('/departments/update/{departmentID}', 'update');
    Route::get('/departments', 'index');
});
Route::controller(ClassesController::class)->middleware('auth')->group(function () {
    Route::get('/classes/create', 'create');
    Route::get('/classes/index', 'index');
    Route::get('/classes/edit/{classesID}', 'edit');
    Route::post('/classes/update/{classesID}', 'update');
    Route::post('/classes/store', 'store');
    Route::get('/classes', 'index');
});