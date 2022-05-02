<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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

Route::get('/', LoginController::class)->name('login');


Route::group(['before' => 'guest'], function() {
Route::post('signin', [LoginController::class,"authenticate"])->name('login-sign-in-post');
Route::get('create_user', [UserController::class,"create"])->name('user-new');
Route::post('store_user', [UserController::class,"store"])->name('user-store');
Route::get('create_student', [StudentController::class,"create"])->name('student-new');
Route::post('store_student', [StudentController::class,"store"])->name('student-store');

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::get('mongo', [BookController::class, 'example_mongo'])->name('mongo');

});

Route::group(['middleware' => ['auth']] , function() {
Route::get('/home', HomeController::class,)->name('home');

Route::get('logout', [LoginController::class,"logout"])->name('log-out-post');

Route::get('show_waiting_students', [StudentController::class,"show_waiting_students"])->name('students-waiting');
Route::get('show_approved_students', [StudentController::class,"show_approved_students"])->name('students-all');

Route::get('create_category', [BookController::class,"create_category"])->name('category-new');
Route::post('category-store', [BookController::class,"store_category"])->name('category-store');

Route::get('create', [BookController::class,"create"])->name('book-new');
Route::post('store', [BookController::class,"store"])->name('book-store');
Route::get('show', [BookController::class,"show"])->name('books');



Route::post('ajaxRequest', [StudentController::class, 'ajaxRequestStatus'])->name('ajaxRequestStatus.post');
});
