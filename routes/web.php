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

//Route::group(['middleware' => ['auth:comsumer, member'] ], function(){
//    Route::get('/home', 'HomeController@index');
//});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\IndexController@index')->name('admin_dashboard'); //

    Route::get('/courses', 'Admin\CourseController@getCourses')->name('admin_get_courses'); //
    Route::get('/course/{id}', 'Admin\CourseController@getCourseDetail' )->name('admin_get_course_detail'); //
    Route::post('/course/create', 'Admin\CourseController@getAddCourse')->name('admin_get_add_course');
    Route::post('/course/add', 'Admin\CourseController@addCourse')->name('admin_add_course');

    Route::get('/lectures', 'Admin\LecturerController@getLecturers')->name('admin_get_lecturers'); //
    Route::get('/lectures/{id}', 'Admin\LecturerController@getLecturerDetail')->name('admin_get_lecturer_detail'); //
    Route::get('/lectures/edit/{id}', 'Admin\LecturerController@getEditLecturer')->name('admin_get_edit_lecturer'); //
    Route::post('/lectures/edit', 'Admin\LecturerController@editLecturer')->name('admin_edit_lecturer'); //
    Route::get('/lecture/create', 'Admin\LecturerController@getAddLecturer')->name('admin_get_add_lecturer');  //
    Route::post('/lectures/add', 'Admin\LecturerController@addLecturer')->name('admin_add_lecturer'); //
    Route::post('/lectures/delete', 'Admin\LecturerController@deleteLecturer')->name('admin_delete_lecturer'); //

    Route::get('/class/create', 'Admin\ClassController@getAddClass')->name('admin_get_add_class');
    Route::get('/classes', 'Admin\ClassController@getClass')->name('admin_get_classes'); //
    Route::get('/class/{id}', 'Admin\ClassController@getClassDetail' )->name('admin_get_class_detail');
    Route::get('/class/edit/{id}', 'Admin\ClassController@getEditClass')->name('admin_get_edit_class');
    Route::post('/class/edit', 'Admin\ClassController@editClass')->name('admin_edit_class');
    Route::post('/class/add', 'Admin\ClassController@addClass')->name('admin_add_class');

    Route::post('/result/upload/{id}', 'Admin\ResultController@uploadResult')->name('admin_result_upload');
    Route::post('/result/uploadScore/{id}', 'Admin\ResultController@uploadResultScore')->name('admin_result_upload_score');
    Route::post('/result/student/{id}', 'Admin\ResultController@resultStudent')->name('admin_result_student');
    Route::get('/result/student/{classId}/{studentId}', 'Admin\ResultController@getResultStudent')->name('admin_get_result_detailForStudent');

    Route::get('/assessment/edit_assessment_tool/{classId}', 'Admin\AssessmentController@getEditAssessmentTool')->name('admin_get_edit_assessmentTool');
    Route::get('/assessment/edit_course_assessment/{classId}', 'Admin\AssessmentController@getEditCourseAssessment')->name('admin_get_edit_courseAssessment');
    Route::get('/assessment/edit_abet_mapping_assessment/{classId}', 'Admin\AssessmentController@getEditAbetMapping')->name('admin_get_edit_abetMapping');
    Route::post('/assessment/edit', 'Admin\AssessmentController@editAssessmentTool')->name('admin_edit_assessmentTool');

});
