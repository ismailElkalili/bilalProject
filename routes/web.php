<?php

use App\Http\Controllers\Api\TeacherControllerApi;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::post('/logout_system', [LoginController::class, 'logout']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//API
Route::get("/data", [TeacherControllerApi::class, 'getData']);

require __DIR__ . '/dashboard.php';

Auth::routes();


Route::get('/file-import',[UserController::class,'importView'])->name('import-view');
Route::post('/import',[UserController::class,'import'])->name('import');
Route::get('/export-users',[UserController::class,'exportUsers'])->name('export-users');


Route::get('/file-import',[TeacherController::class,'importView'])->name('import-view');
Route::post('/importT',[TeacherController::class,'importTeachers'])->name('importT');
Route::get('/export-teachers',[TeacherController::class,'exportTeachers'])->name('export-teachers');


Route::get('/file-import',[StudentController::class,'importView'])->name('import-view');
Route::post('/importS',[StudentController::class,'importStudents'])->name('importS');
Route::get('/export-students',[StudentController::class,'exportStudents'])->name('export-students');

Route::get('/export-classes',[ClassesController::class,'exportClasses'])->name('export-classes');
Route::get('/export-class/{classesID}',[ClassesController::class,'exportClass']);