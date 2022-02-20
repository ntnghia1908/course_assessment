<?php

namespace App\Http\Controllers\Admin;

use App\AssessmentTool;
use App\ClassAssessment;
use App\ClassAssessmentCourse;
use App\ClassAssessmentTool;
use App\ClassSession;
use App\ClassSloClo;
use App\Course;
use App\CourseAssessment;
use App\Http\Controllers\Controller;
use App\Http\Services\ResultService;
use App\Result;
use Illuminate\Http\Request;


class AssessmentToolController extends Controller
{
    function getEditAssessmentTool($class_id) {
        $class = ClassSession::find($class_id);
        $courseAssessment= ClassAssessmentCourse::where([ ['class_id', '=', $class_id], ['assessment_id', '<>', 10] ])->get();
        $loList = $class->course->learningOutcomes;
        $classAssessmentTool= ClassAssessmentTool::getByClassAssessmentAndLO($class_id, $loList);

        return view('admin.assessment-edit', compact('class' , 'courseAssessment',
            'loList', 'classAssessmentTool' ));
    }

    function getEditCourseAssessmentTool($course_id) {
        $course = Course::find($course_id);
        $courseAssessment= CourseAssessment::where([ ['course_id', '=', $course_id], ['assessment_id', '<>', 10] ])->get();
        $loList = $course->learningOutcomes;
        $courseAssessmentTool= AssessmentTool::getCourseAssessmentAndLO($course_id);

        return view('admin.assessmentToolCourse-edit', compact('course' , 'courseAssessment',
            'loList', 'courseAssessmentTool' ));
    }

    function updateAssessmentTool(Request $request) {
        $classId = $request->class_id;
        $assessmentTool = $request->assessmentTool;
        $classAssessment = ClassAssessment::where(['class_id'=>$classId]);
        $classAssessment->delete();
        foreach($assessmentTool as $caId => $ca) {
            foreach($ca as $cloId=>$precentage) {
                $classAssessment = new ClassAssessment();
                $classAssessment->class_id =$classId;
                $classAssessment->assessment_id=$caId;
                $classAssessment->learning_outcome_id=$cloId;
                $classAssessment->precentage=$precentage;
                $classAssessment->save();
                $temp = ['class_id'=>$classId, 'assessment_id'=>$caId, 'learning_outcome_id'=>$cloId, 'precentage'=>$precentage];
//                dump($temp);
            }
        }
//        dump($newAssessmentTool);
        // TODO: rewrite request cho giong newAssessmentTool format
        return response()->json(['flag' => 'success', 'message' => 'Update successfully!', 'key' => 'Success']);
//        return response()->json(['flag' => 'success', 'message' => 'update fail!', 'key' => 'Fail']);
    }

    function updateAssessmentToolCourse(Request $request) {
        $courseId = $request->course_id;
        dump($courseId);
        $assessmentTool = $request->assessmentTool;
        $courseAssessmentTool = AssessmentTool::where(['course_id'=>$courseId]);
        $courseAssessmentTool->delete();
        foreach($assessmentTool as $caId => $ca) {
            foreach($ca as $cloId=>$precentage) {
                $courseAssessmentTool = new AssessmentTool();
                $courseAssessmentTool->course_id =$courseId;
                $courseAssessmentTool->assessment_id=$caId;
                $courseAssessmentTool->loutcome_id=$cloId;
                $courseAssessmentTool->precentage=$precentage;
                $courseAssessmentTool->save();
                $temp = ['course_id'=>$courseId, 'assessment_id'=>$caId, 'learning_outcome_id'=>$cloId, 'precentage'=>$precentage];
//                dump($temp);
            }
        }
//        dump($newAssessmentTool);
        // TODO: rewrite request cho giong newAssessmentTool format
//        return response()->json();
//        return redirect()->back()->with(['flag' => 'success', 'message' => 'Update successfully!', 'key' => 'Success']);
        return response()->json(['flag' => 'success', 'message' => 'update fail!', 'key' => 'Fail']);
    }
}
