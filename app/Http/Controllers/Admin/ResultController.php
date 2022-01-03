<?php

namespace App\Http\Controllers\Admin;

use App\ClassAssessment;
use App\ClassAssessmentCourse;
use App\ClassAssessmentTool;
use App\ClassSloClo;
use App\Http\Controllers\Controller;
use App\Http\Services\GradingService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
//    protected $gradingService = new GradingService();
    function admin_result_upload(Request $request) {
        //
    }

    function  uploadResultScore(Request $request) {
        if ($request->hasFile('score_file')) {

            $resultList = [];
            $classAssessmentCourses = ClassAssessmentCourse::where(['class_id'=>$request->class_id]);
            $classAssessmentTools= ClassAssessmentTool::where(['class_id'=>$request->class_id]);
            $classSloClos = ClassSloClo::where(['class_id'=>$request->class_id]);

            foreach($resultList as $result) {
                GradingService::calculateGPA($result, $classAssessmentCourses);
                GradingService::calculateAbetScoreOfStudent($classAssessmentTools,$classAssessmentCourses,$classSloClos,$result);
                GradingService::addStudentToClass($result);
            }
        }
    }

}
