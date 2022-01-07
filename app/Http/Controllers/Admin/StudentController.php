<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Result;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function getStudents() {
        $students= Student::all();
        return view('admin.student-list', compact('students'));
    }

    function getAddStudent() {
        return view('admin.student-edit');
    }

    function getEditStudent($student_id) {
        $student = Student::find($student_id);
        return view('admin.student-edit', compact('student'));
    }

    function getStudentDetail($student_id) {
        $student = Student::find($student_id);
        $studentResults = Result::where(['student_id'=> $student_id])->get();
        return view('admin.student-detail', compact('student', 'studentResults'));
    }


}
