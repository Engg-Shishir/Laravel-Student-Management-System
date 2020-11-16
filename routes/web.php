<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CourseController;
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
    return view('welcome');
});

Route::get('/log', [AdminController::class, 'loginview']);
Route::post('/login', [AdminController::class, 'login'])->name('login');


Route::get('/dashboard', [AdminController::class, 'dashboard']);


Route::get('/studentregister', [StudentController::class, 'create']);

Route::post('/register/store', [StudentController::class, 'store']);

Route::get('/studentdetails', [StudentController::class, 'show']);

Route::get('/student/edit/{id}', [StudentController::class, 'edit']);

Route::post('/student/update/{id}', [StudentController::class, 'update']);

Route::get('/student/destroy/{id}', [StudentController::class, 'destroy']);


Route::get('/addbranch', [BranchController::class, 'create']);


Route::post('/branch/store', [BranchController::class, 'store']);

Route::get('/showbranch', [BranchController::class, 'show']);



Route::get('/addcourse', [CourseController::class, 'create']);

Route::post('/course/store', [CourseController::class, 'store']);

Route::get('/showcourse', [CourseController::class, 'show']);


Route::get('/ctudent/course/{id}', [StudentController::class, 'courses']);












