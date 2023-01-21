<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TeacherControllerApi;
use App\Http\Controllers\TeacherController;
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
    return view('dashboard-layout\dashboard-main');
});

Route::get("data",[TeacherControllerApi::class,'getData']);

Route::controller(TeacherController::class)->group(function () {
    Route::get('/teacher', 'index');
    Route::post('/teacher/create', 'create');
    Route::post('/teacher/store', 'store');
    Route::post('/teacher/update', 'update');
    Route::post('/teacher/edit', 'edit');
    Route::post('/teacher/destroy', 'destroy');
    Route::get('/teacher/{id}', 'show');

});