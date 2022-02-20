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

    Route::post('/result/upload/{class_id}', 'Admin\ResultController@uploadResult')->name('admin_result_upload');
    Route::post('/result/uploadScore/{class_id}', 'Admin\ResultController@uploadResultScore')->name('admin_result_upload_score');
    Route::get('/result/detailForStudent/{class_id}/{student_id}', 'Admin\ResultController@showDetailResultOfStudentInSpecificClass')->name('admin_get_result_detailForStudent');
    Route::post('/result/deleteStudentInClass/{class_id}/{student_id}', 'Admin\ResultController@deleteStudentFromClass')->name('admin_delete_student_from_class');
    Route::get('/result/assignCourse/{class_id}/{student_id}', 'Admin\ResultController@assignCourseForStudent')->name('admin_assign_course_for_student');
    Route::post('/result/upload/{class_id}', 'Admin\ResultController@saveStudentListForClass')->name('admin_save_student_list_for_class');

    Route::get('/student/create', 'Admin\StudentController@getAddStudent')->name('admin_get_add_student_page');
    Route::post('/student/add', 'Admin\StudentController@addStudent')->name('admin_add_student');
    Route::get('/students', 'Admin\StudentController@getStudents')->name('admin_get_students');
    Route::get('/student/delete/{student_id}', 'Admin\StudentController@getStudentDelele')->name('admin_delete_student');
    Route::get('/student/{student_id}', 'Admin\StudentController@getStudentDetail')->name('admin_get_student_detail');

    Route::post('/assessment/edit', 'Admin\AssessmentToolController@updateAssessmentTool')->name('admin_edit_assessmentTool');
    Route::post('/assessmentToolCourse/edit', 'Admin\AssessmentToolController@updateAssessmentToolCourse')->name('admin_edit_assessmentToolCourse');
    Route::get('/assessment/edit_assessment_tool/{classId}', 'Admin\AssessmentToolController@getEditAssessmentTool')->name('admin_get_edit_assessmentTool');
    Route::get('/assessment/edit_assessment_tool_course/{courseId}', 'Admin\AssessmentToolController@getEditCourseAssessmentTool')->name('admin_get_edit_courseAssessmentTool');
    Route::get('/assessment/edit_course_assessment/{classId}', 'Admin\AssessmentToolController@getEditClassAssessment')->name('admin_get_edit_classAssessment');
    Route::get('/assessment/edit_course_assessmentCourse/{courseId}', 'Admin\AssessmentToolController@getEditCourseAssessment')->name('admin_get_edit_courseAssessment');

    Route::get('/abet/calculate_abet_score_course/{courseId}', 'Admin\ResultController@calculateAbetScoreForCourse')->name('admin_calculate_abet_course');
    Route::get('/abet/edit_abet_mapping_assessment/{classId}', 'Admin\AbetMappingController@getEditAbetMappingClass')->name('admin_get_edit_abetMapping_class');
    Route::get('/abet/edit_abet_mapping_course/{courseId}', 'Admin\AbetMappingController@getEditAbetMappingCourse')->name('admin_get_edit_abetMapping_course');
//    Route::get('/abet/')

});
