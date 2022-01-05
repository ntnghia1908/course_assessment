<?php

namespace App\Http\Controllers\Admin;

use App\AssessmentTool;
use App\ClassAssessment;
use App\ClassAssessmentCourse;
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
        $resultList = Result::where(['class_id'=>$id])->get();
        $courseAssessment= ClassAssessmentCourse::where([ ['class_id', '=', $id], ['assessment_id', '<>', 10] ])->get();


        $loList = $class->course->learningOutcomes;
        $classAssessmentTool= ClassAssessmentTool::getByClassAssessmentAndLO($id, $loList);
        $abetMapping = ClassSloClo::getClassAbetMapping($loList);
        $resultSummary = self::getResultSummary($resultList);

        return view('admin.class-detail', compact('class', 'resultList', 'courseAssessment',
            'loList', 'classAssessmentTool', 'abetMapping', 'resultSummary'));
    }

    private function getResultSummary($resultList): array
    {
        $numPass_1=0; $numPass_2=0; $numPass_3=0; $numPass_4=0; $numPass_5=0; $numPass_6=0;
        $avg_1=0; $avg_2=0; $avg_3=0; $avg_4=0; $avg_5=0; $avg_6=0;

        foreach ($resultList as $r) {
            if($r->abet_1 != null) {
                $avg_1 +=$r->abet_1;
                if($r->abet_1 >= 50)
                    $numPass_1 += 1;
            }

            if($r->abet_2 != null) {
                $avg_2 +=$r->abet_2;
                if($r->abet_2 >= 50)
                    $numPass_2 += 1;
            }

            if($r->abet_3 != null) {
                $avg_3 +=$r->abet_3;
                if($r->abet_3 >= 50)
                    $numPass_3 += 1;
            }

            if($r->abet_4 != null) {
                $avg_4 +=$r->abet_4;
                if($r->abet_4 >= 50)
                    $numPass_4 += 1;
            }

            if($r->abet_5 != null) {
                $avg_5 +=$r->abet_5;
                if($r->abet_5 >= 50)
                    $numPass_5 += 1;
            }

            if($r->abet_6 != null) {
                $avg_6 +=$r->abet_1;
                if($r->abet_6 >= 50)
                    $numPass_6 += 1;
            }
        }

        $resultSummary = [];
        if($avg_1 > 0) {
            $result = [1];
            array_push($result, round($numPass_1 * 100/ count($resultList) ));
            array_push($result, round($avg_1/ count($resultList)));
            array_push($resultSummary, $result);
        }
        if($avg_2 > 0) {
            $result = [2];
            array_push($result, round($numPass_2 * 100/ count($resultList) ));
            array_push($result, round($avg_2/ count($resultList)));
            array_push($resultSummary, $result);
        }
        if($avg_3 > 0) {
            $result = [3];
            array_push($result, round($numPass_3 * 100/ count($resultList) ));
            array_push($result, round($avg_3/ count($resultList)));
            array_push($resultSummary, $result);
        }
        if($avg_4 > 0) {
            $result = [4];
            array_push($result, round($numPass_4 * 100/ count($resultList) ));
            array_push($result, round($avg_4/ count($resultList)));
            array_push($resultSummary, $result);
        }
        if($avg_5 > 0) {
            $result = [5];
            array_push($result, round($numPass_5 * 100/ count($resultList) ));
            array_push($result, round($avg_5/ count($resultList)));
            array_push($resultSummary, $result);
        }
        if($avg_6 > 0) {
            $result = [6];
            array_push($result, round($numPass_6 * 100/ count($resultList) ));
            array_push($result, round($avg_6/ count($resultList)));
            array_push($resultSummary, $result);
        }

        return $resultSummary;
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
