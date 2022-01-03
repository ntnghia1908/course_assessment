<?php

namespace App\Http\Controllers;

use App\AssessmentTool;
use App\ClassSession;
use App\CloSlo;
use App\Course;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    //

    function getEditAssessmentTool($classId) {
        $classSession = ClassSession::find($classId);
        $course = Course::with('classSessions')->find($classId);
        $loList = $course->learningOutcomes;

        $classSessions = ClassSession::with('instructor')->where(['course_id' => $classId]);
        $newAssessmentTool= AssessmentTool::getNewAssessmentTool($classId, $loList);
        $abetMapping = CloSlo::getAbetMapping($loList);
    }

    function editAssessmentTool(Request $request) {

    }

    function  getEditCourseAssessment($classId) {

    }

    function editCourseAssessment(Request $request) {

    }
}
