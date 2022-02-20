<?php

namespace App\Http\Controllers\Admin;

use App\ClassAssessmentCourse;
use App\ClassSession;
use App\ClassSloClo;
use App\Course;
use App\CourseAssessment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbetMappingController extends Controller
{
    //

    function calculateAbetScoreForCourse($courseId) {
        return redirect()->back()->with([]);
    }

    function getEditAbetMapping ($class_id) {
        $class = ClassSession::find($class_id);
        $courseAssessment= ClassAssessmentCourse::where([ ['class_id', '=', $class_id], ['assessment_id', '<>', 10] ])->get();
        $loList = $class->course->learningOutcomes;
        $abetMapping = ClassSloClo::getClassAbetMapping($loList);
        return view('admin.abetMapping-edit', compact('class' , 'courseAssessment', 'loList', 'abetMapping' ));
    }

    function getEditAbetMappingCourse ($course_id) {
        $course = Course::find($course_id);
        $courseAssessment= CourseAssessment::where([ ['course_id', '=', $course_id], ['assessment_id', '<>', 10] ])->get();
        $loList = $course->learningOutcomes;
        $abetMapping = ClassSloClo::getClassAbetMapping($loList);
        return view('admin.abetMappingCourse-edit', compact('course' , 'courseAssessment', 'loList', 'abetMapping' ));
    }

    function updateAbetMappingClass(Request $request) {
        dump($request->assessmentTool);
        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
