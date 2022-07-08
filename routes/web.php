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