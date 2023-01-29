<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
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
    Route::get('/committees/show/{committeesID}', 'show');
    Route::post('/committees/destroy/{id}', 'destroy');
    Route::get('/committees/search', 'search');

});

Route::controller(TeacherController::class)->middleware('auth')->group(function () {
    Route::get('/teacher', 'index');
    Route::get('/teacher/create', 'create');
    Route::post('/teacher/store', 'store');
    Route::post('/teacher/update', 'update');
    Route::get('/teacher/edit/{id}', 'edit');
    Route::post('/teacher/archive/{id}', 'archive');
    Route::post('/teacher/destroy/{id}', 'destroy');
    Route::post('/teacher/restore/{id}', 'restore');
    Route::get('/teacher/show/{id}', 'show');
    Route::get('/teacher/search', 'search');

});

Route::controller(StudentController::class)->middleware('auth')->group(function () {
    Route::get('/student', 'index');
    Route::get('/student/create', 'create');
    Route::post('/student/store', 'store');
    Route::get('/student/edit/{studentID}', 'edit');
    Route::post('/student/update/{studentID}', 'update');
    Route::get('/student/show/{studentID}', 'show');
    Route::post('/student/archive/{id}', 'archive');
    Route::post('/student/destroy/{id}', 'destroy');
    Route::post('/student/restore/{id}', 'restore');
    Route::get('/student/search', 'search');
});

Route::controller(DepartmentController::class)->middleware('auth')->group(function () {
    Route::get('/departments/create', 'create');
    Route::post('/departments/store', 'store');
    Route::get('/departments/index', 'index');
    Route::get('/departments/edit/{departmentID}', 'edit');
    Route::post('/departments/update/{departmentID}', 'update');
    Route::post('/departments/destroy/{id}', 'destroy');
    Route::get('/departments', 'index');
    Route::get('/departments/show/{departmentID}', 'show');
    Route::get('/departments/search', 'search');
   
});
Route::controller(ClassesController::class)->middleware('auth')->group(function () {
    Route::get('/classes/create', 'create');
    Route::get('/classes/index', 'index');
    Route::get('/classes/edit/{classesID}', 'edit');
    Route::post('/classes/update/{classesID}', 'update');
    Route::post('/classes/destroy/{id}', 'destroy');
    Route::post('/classes/store', 'store');
    Route::get('/classes', 'index');
    Route::get('/classes/show/{classesID}', 'show'); 
    Route::get('/classes/search', 'search');

});
Route::controller(ArchiveController::class)->middleware('auth')->group(function () {
    Route::get('/archive/teacher', 'index_teacher');
    Route::get('/archive/student', 'index_student');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});