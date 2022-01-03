<?php

namespace App\Http\Controllers\Admin;

use App\AssessmentTool;
use App\ClassAssessmentTool;
use App\ClassSession;
use App\ClassSloClo;
use App\CloSlo;
use App\Course;
use App\CourseAssessment;
use App\Instructor;
use App\Result;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function __construct()
    {
        //
    }

    function getClass() {
        $classes = ClassSession::all();
        return view('admin.class-list', compact('classes'));
    }


    function getClassDetail($id) {
        $class = ClassSession::find($id);
        $resultList = Result::where(['class_id'=>$id]);
        $courseAssessment= CourseAssessment::where([ ['course_id', '=', $id], ['assessment_id', '<>', 10] ])->get();
        $loList = $class->course->learningOutcomes;

        $classAssessmentTool= ClassAssessmentTool::getByClassAssessmentAndLO($id, $loList);
        $abetMapping = ClassSloClo::getClassAbetMapping($loList);

        return view('admin.class-detail', compact('class', 'resultList', 'courseAssessment',
            'loList', 'classAssessmentTool', 'abetMapping'));
    }

    function getAddClass() {
        $courseList = Course::all();
        $instructorList = Instructor::all();
        $courseNames = $courseList->pluck('name');
        return view('admin.class-edit', compact( 'courseList', 'instructorList', 'courseNames'));
    }

    function getEditClass($classId) {
        $classSession = ClassSession::find($classId);
        $courseList = Course::all();
        $instructorList = Instructor::all();
        $courseNames = $courseList->pluck('name');
        return view('admin.class-edit', compact('classSession', 'courseList', 'instructorList',
        'courseNames'));
    }

    function editClass(Request $request) {
        if($request->method('post')) {
            $attributes = $request->except('_token', 'id');
            $class = ClassSession::find($request->id);

            $class->fill($attributes);
            $result = $class->update();

            if ($result)
                return redirect()->route('admin_get_edit_class', ['id' => @$class->id])->with(
                    ['flag' => 'success', 'message' => 'Class is updated!', 'key' => 'Success', 'icon' => 'check']);
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Cannot create class', 'key' => 'Fail', 'icon' => 'warning']);
        }
    }

    function addClass( Request  $request) {
        //
    }
}
