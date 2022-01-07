<?php

namespace App\Http\Controllers\Admin;

use App\ClassAssessment;
use App\ClassAssessmentCourse;
use App\ClassAssessmentTool;
use App\ClassSession;
use App\ClassSloClo;
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

    function getEditAbetMapping ($class_id) {
        $class = ClassSession::find($class_id);
        $courseAssessment= ClassAssessmentCourse::where([ ['class_id', '=', $class_id], ['assessment_id', '<>', 10] ])->get();

        $loList = $class->course->learningOutcomes;
        $abetMapping = ClassSloClo::getClassAbetMapping($loList);

        return view('admin.abetMapping-edit', compact('class' , 'courseAssessment', 'loList', 'abetMapping' ));
    }

    function updateAbetMapping(Request $request) {
        dump($request->assessmentTool);

//        foreach ($abetMappingList as $sloClo) {
//            $sloClo-> $request->input('cell-cloId-sloId');
//        }
        return response()->json(['success'=>'Ajax request submitted successfully']);
    }



    function updateAssessmentTool(Request $request) {
        $classId = $request->class_id;
//        $newAssessmentTool = [];
        $assessmentTool = $request->assessmentTool;
        $classAssessment = ClassAssessment::where(['class_id'=>$classId]);
        $classAssessment->delete();
//        dump($assessmentTool);
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
//                ClassAssessment::create([ 'assessment_id'=>$caId, 'class_id'=>$classId, 'learning_outcome_id'=>$cloId, 'precentage'=>$precentage]);
//                array_push($newAssessmentTool, $temp);
            }
        }
//        dump($newAssessmentTool);
        // TODO: rewrite request cho giong newAssessmentTool format
        ;
//        dump(array_values(response()->json($classAssessment)->getData()));
//        $classAssessment->update(response()->json());
//        if($classAssessment->isDirty())
            return response()->json(['flag' => 'success', 'message' => 'Update successfully!', 'key' => 'Success']);
        return response()->json(['flag' => 'success', 'message' => 'update fail!', 'key' => 'Fail']);
    }
}
