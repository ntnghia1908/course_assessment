<?php

namespace App\Http\Controllers\Admin;

use App\AssessmentTool;
use App\ClassSession;
use App\CloSlo;
use App\Course;
use App\CourseAssessment;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdmin;
use DebugBar;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function __construct()
    {
//        return $this->middleware(CheckAdmin::class);
    }

    function getCourses() {
        $courses = Course::all();
        return view('admin.course-list', compact('courses'));
    }

    function getCourseDetail($id) {
        $courseAssessment= CourseAssessment::where([ ['course_id', '=', $id], ['assessment_id', '<>', 10] ])->get();
        $course = Course::with('classSessions')->find($id);
        $loList = $course->learningOutcomes;
        $classSessions = ClassSession::with('instructor')->where(['course_id' => $id])->get();

        $newAssessmentTool= AssessmentTool::getByCourseAssessmentAndLO($id, $loList);
        $abetMapping = CloSlo::getAbetMapping($loList);

        DebugBar::error($abetMapping);

        return view('admin.course-detail', compact('course',
                 'newAssessmentTool', 'loList', 'classSessions',
                        'courseAssessment', 'abetMapping'));
    }
}
