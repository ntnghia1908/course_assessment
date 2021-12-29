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
//        $course = Course::find($id);
        $course = Course::with('classSessions')->find($id);
//        $classSessionList = $course->classSessionList;
        $classSessions = ClassSession::with('instructor')->where(['course_id' => $id]);
        $loList = $course->learningOutcomes;

        $newAssessmentTool= self::getNewAssessmentTool($id, $loList);
        $abetMapping = self::getAbetMapping($loList);

        DebugBar::error($abetMapping);

        return view('admin.course-detail', compact('course',
                 'newAssessmentTool', 'loList', 'classSessions',
                        'courseAssessment', 'abetMapping'));
    }

    function getNewAssessmentTool($courseId, $loList) {
        $newAssessmentTool = [];
        foreach($loList as $lo) {
            $ast = AssessmentTool::where([
                ['course_id', '=', $courseId],
                ['loutcome_id', '=', $lo->id],
                ['assessment_id', '<>', 10],
            ])->get();

            $assessments =[];
            foreach($ast as $as)
                $assessments[$as->assessment_id] = $as->percentage;

            $newAssessmentTool[$lo->id] = $assessments;
        }
        return $newAssessmentTool;
    }

    function getAbetMapping($loList) {
        $abetMapping = [];
        foreach ($loList as $lo) {
            $item = [];
            for($slo=1; $slo<7; $slo++) {
                $tem_sloClo = CloSlo::where([ ['lo_id', '=', $lo->id], ['slo_id' ,'=', $slo] ])->get();

                foreach ($tem_sloClo as $sloClo)
                    $item[$slo] = $sloClo->percentage; // NEED refactor
            }
            $abetMapping[$lo->id] = $item;
        }
        return $abetMapping;
    }
}
