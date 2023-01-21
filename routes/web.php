<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\CommitteeController;

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

Route::get('/dashborad/committees/create',[CommitteeController::class,'create'])
->name('dashboard\committee\create');

Route::get("data",[TeacherController::class,'getData']);