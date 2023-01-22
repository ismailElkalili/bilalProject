<?php

use App\Http\Controllers\Api\TeacherControllerApi;
use App\Http\Controllers\CommitteeController;
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
    ->name('dashboard/committee/create');

Route::post('/dashborad/committees/store', [CommitteeController::class, 'store']);
Route::get('/dashborad/committees/index', [CommitteeController::class, 'index']);
Route::get('/dashborad/committees/edit/{committeeID}', [CommitteeController::class, 'edit']);
Route::post('/dashborad/committees/update/{committeeID}', [CommitteeController::class, 'update']);

Route::post('/committees/store', [CommitteeController::class, 'store']);
Route::get('/committees', [CommitteeController::class, 'index']);
Route::get('/committees/edit/{committeeID}', [CommitteeController::class, 'edit']);
Route::post('/committees/update/{committeeID}', [CommitteeController::class, 'update']);


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



Route::get('/student', [StudentController::class, 'index']);
Route::post('/student/store', [StudentController::class, 'store']);
Route::get('/student/create', [StudentController::class, 'create'])
    ->name('dashboard\student\create');
Route::get('/student/edit/{studentID}', [StudentController::class, 'edit']);
Route::post('/student/update/{studentID}', [StudentController::class, 'update']);