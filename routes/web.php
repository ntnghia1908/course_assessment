<?php

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

Route::get('/','Admin\IndexController@index')->name('admin_dashboard');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\IndexController@index')->name('admin_dashboard');
    Route::get('/courses', 'Admin\CourseController@getCourses')->name('admin_get_courses');
    Route::get('/course/{id}', 'Admin\CourseController@getCourseDetail' )->name('admin_get_course_detail');
    Route::get('/lectures', 'Admin\LecturerController@getLecturers')->name('admin_get_lecturers');
    Route::get('/lecture/create', 'Admin\LecturerController@getAddLecturer')->name('admin_get_add_lecturer');
    Route::get('/lectures/{id}', 'Admin\LecturerController@getLecturerDetail')->name('admin_get_lecturer_detail');
    Route::get('/lectures/edit/{id}', 'Admin\LecturerController@getEditLecturer')->name('admin_get_edit_lecturer');
    Route::post('/lectures/edit', 'Admin\LecturerController@editLecturer')->name('admin_edit_lecturer');
    Route::post('/lectures/add', 'Admin\LecturerController@addLecturer')->name('admin_add_lecturer');
    Route::post('/lectures/delete', 'Admin\LecturerController@deleteLecturer')->name('admin_delete_lecturer');
});
