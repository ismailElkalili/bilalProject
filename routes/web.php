<?php

use App\Http\Controllers\Api\TeacherControllerApi;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard_layout\dashboard_main');
});

Route::get('/committees/create', [CommitteeController::class, 'create'])
    ->name('dashboard/committees/create');
Route::post('/committees/store', [CommitteeController::class, 'store']);
Route::get('/committees', [CommitteeController::class, 'index']);
Route::get('/committees/edit/{committeesID}', [CommitteeController::class, 'edit']);
Route::post('/committees/update/{committeesID}', [CommitteeController::class, 'update']);


Route::get("data", [TeacherController::class, 'getData']);
Route::get("data", [TeacherControllerApi::class, 'getData']);

Route::controller(TeacherController::class)->group(function () {
    Route::get('/teacher', 'index');
    Route::get('/teacher/create', 'create');
    Route::post('/teacher/store', 'store');
    Route::post('/teacher/update', 'update');
    Route::get('/teacher/edit/{id}', 'edit');
    // Route::post('/teacher/destroy/{id}', 'destroy');
    Route::get('/teacher/show/{id}', 'show');


});


Route::get('/student/create', [StudentController::class, 'create'])
    ->name('dashboard\student\create');
Route::get('/student', [StudentController::class, 'index']);
Route::post('/student/store', [StudentController::class, 'store']);
Route::get('/student/edit/{studentID}', [StudentController::class, 'edit']);
Route::post('/student/update/{studentID}', [StudentController::class, 'update']);
Route::get('/student/{studentID}', [StudentController::class, 'show']);


Route::get('/departments/create', [DepartmentController::class, 'create'])
    ->name('dashboard/department/create');
Route::post('/departments/store', [DepartmentController::class, 'store']);
Route::get('/departments/index', [DepartmentController::class, 'index']);
Route::get('/departments/edit/{departmentID}', [DepartmentController::class, 'edit']);
Route::post('/departments/update/{departmentID}', [DepartmentController::class, 'update']);
Route::get('/departments', [DepartmentController::class, 'index']);


Route::get('/classes/create', [ClassesController::class, 'create'])
    ->name('dashboard/classes/create');
Route::get('/classes/index', [ClassesController::class, 'index']);
Route::get('/classes/edit/{classesID}', [ClassesController::class, 'edit']);
Route::post('/classes/update/{classesID}', [ClassesController::class, 'update']);
Route::post('/classes/store', [ClassesController::class, 'store']);
Route::get('/classes', [ClassesController::class, 'index']);