<?php

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


Auth::routes([
    'register' => false
]);


// Admin Routes

Route::get('/admin_index',[App\Http\Controllers\UserController::class, 'index'])->name('admin.index');
Route::post('/admin_store',[App\Http\Controllers\UserController::class, 'store'])->name('admin.store');
Route::get('/admin_destroy/{id}',[App\Http\Controllers\UserController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin_edit/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('admin.edit');
Route::put('/admin_update/{id}',[App\Http\Controllers\UserController::class, 'update'])->name('admin.update');
Route::get('/admin_search',[App\Http\Controllers\UserController::class, 'search'])->name('admin.search');


Route::get('/departments_index',[App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
Route::post('/departments_store',[App\Http\Controllers\DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments_destroy/{id}',[App\Http\Controllers\DepartmentController::class, 'destroy'])->name('departments.destroy');
Route::get('/departments_edit/{id}',[App\Http\Controllers\DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/departments_update/{id}',[App\Http\Controllers\DepartmentController::class, 'update'])->name('departments.update');
Route::get('/departments_search',[App\Http\Controllers\DepartmentController::class, 'search'])->name('departments.search');



// User Routes

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/members_index', 'App\Http\Controllers\MemberController@index')->name('members.index');
Route::get('/mentors_index', 'App\Http\Controllers\MentorController@index')->name('mentors.index');

Route::post('/members_store', 'App\Http\Controllers\MemberController@store')->name('members.store');
Route::post('/mentors_store', 'App\Http\Controllers\MentorController@store')->name('mentors.store');

Route::get('/members_destroy/{id}', 'App\Http\Controllers\MemberController@destroy')->name('members.destroy');
Route::get('/mentors_destroy/{id}', 'App\Http\Controllers\MentorController@destroy')->name('mentors.destroy');

Route::get('/members_edit/{id}', 'App\Http\Controllers\MemberController@edit')->name('members.edit');
Route::get('/mentors_edit/{id}', 'App\Http\Controllers\MentorController@edit')->name('mentors.edit');

Route::put('/members_update/{id}', 'App\Http\Controllers\MemberController@update')->name('members.update');
Route::put('/mentors_update/{id}', 'App\Http\Controllers\MentorController@update')->name('mentors.update');

Route::get('/members_search', 'App\Http\Controllers\MemberController@search')->name('members.search');
Route::get('/mentors_search', 'App\Http\Controllers\MentorController@search')->name('mentors.search');