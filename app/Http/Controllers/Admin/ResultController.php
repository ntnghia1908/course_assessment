<?php

namespace App\Http\Controllers\Admin;

use App\AsiinAssessmentTool;
use App\AsiinClo;
use App\AssessmentTool;
use App\ClassAssessment;
use App\ClassAssessmentCourse;
use App\ClassAssessmentTool;
use App\ClassSession;
use App\ClassSloClo;
use App\CloSlo;
use App\CourseAssessment;
use App\CourseAssessmentAsiin;
use App\Http\Controllers\Controller;
use App\Http\Services\GradingService;
use App\Http\Services\ResultService;
use App\LearningOutcome;
use App\Result;
use App\Student;
use DebugBar;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    function showDetailResultOfStudentInSpecificClass($class_id, $student_id)
    {
        $studentResult = Result::with('classSession', 'student')
                                ->where([['class_id', $class_id], ['student_id', $student_id]])
                                ->first();

        $classSession = ClassSession::find($class_id);
        $student = Student::find($student_id);
        return view('admin.student-resultDetail', compact('studentResult', 'classSession', 'student'));
    }

    function deleteStudentFromClass(Request $request)
    {
        //
    }

    function assignCourseForStudent($class_id, $student_id)
    {
        //
    }

    function saveStudentListForClass(Request $request)
    {
        //
    }

    function uploadResultScore(Request $request)
    {
        $class_id = $request->class_id;
        if($request->hasFile('score_file'))
            $file = $request->file('score_file');
        $resultList = ResultService::readStudentScoreFromExcelFile($file);
        $classAssessmentCourse = ClassAssessmentCourse::where(['class_id' => $class_id])->get();
        $classAssessmentTools = ClassAssessment::where(['class_id' => $class_id])->get();
        $classSloClos = ClassSloClo::where(['class_id'=>$class_id])->get();


        $resultDB = Result::where(['class_id'=>$class_id]);
        dump($resultDB);
        if(isset($resultDB))
            $resultDB->delete();


        foreach ($resultList as $result) {
            $result->class_id = $class_id;
//            $result->classSession = ClassSession::find($class_id);
            GradingService::calculateGPA($result, $classAssessmentCourse);
            GradingService::calculateAbetScoreOfStudent($classAssessmentTools, $classAssessmentCourse, $result, $classSloClos);
            $result->save();
            // resultDB->update();
        }
        return redirect()->back()->with(['flag' => 'success', 'message' => 'Assign student successfully!', 'key' => 'Success']);
    }

    function calculateAbetScoreForCourse($courseId)
    {
        $courseAssessmentAsiin = CourseAssessmentAsiin::where(['course_id' => $courseId])->get();
        $asiinAssessmentTools = AsiinAssessmentTool::where(['course_id' => $courseId])->get();
        $courseClos = AsiinClo::where('id', 'LIKE', "$courseId%")->pluck('id'); // SELECT ID FROM ASIIN_CLO WHERE LIKE ...
        $sloClos = CloSlo::where(['lo_id', 'IN', $courseClos])->get();
        $resultCourse = Result::where('class_id', 'LIKE', "$courseId%");

        foreach ($resultCourse as $result) {
            GradingService::calculateGPA($result, $courseAssessmentAsiin);
            GradingService::calculateAbetScoreOfStudent($asiinAssessmentTools, $courseAssessmentAsiin, $result, $sloClos);
            $result->update();
        }
        dump($courseId);
        return redirect()->back()->with(['flag' => 'success', 'message' => 'Abet score has been calculated!', 'key' => 'Success']);
    }
}
