<?php

namespace App\Http\Controllers\Admin;

use App\ClassAssessment;
use App\ClassAssessmentCourse;
use App\ClassAssessmentTool;
use App\ClassSession;
use App\ClassSloClo;
use App\Http\Controllers\Controller;
use App\Http\Services\GradingService;
use App\Result;
use App\Student;
use DebugBar;
use Illuminate\Http\Request;

class ResultController extends Controller
{
//    protected $gradingService = new GradingService();
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
        $resultList = self::readStudentScoreFromExcelFile($file);
        $classAssessmentCourse = ClassAssessmentCourse::where(['class_id' => $class_id])->get();
        $classAssessmentTools = ClassAssessment::where(['class_id' => $class_id])->get();
        $classSloClos = ClassSloClo::where(['class_id'=>$class_id])->get();

        foreach ($resultList as $result) {
            $result->class_id = $class_id;
//            $result->classSession = ClassSession::find($class_id);
            GradingService::calculateGPA($result, $classAssessmentCourse);
            GradingService::calculateAbetScoreOfStudent($classAssessmentTools, $classAssessmentCourse, $result, $classSloClos);
            $result->save();
        }
        return redirect()->back()->with(['flag' => 'success', 'message' => 'Assign student successfully!', 'key' => 'Success']);
    }

    private function  readStudentScoreFromExcelFile($file): array
    {
        $array_data = self::file2array($file);
        $result_list = array();

        foreach ($array_data as $row) {
            $student_result = new Result();
            $student_result->student_id = $row[0];
            $student_result->in_class_score = (double) $row[1];
            $student_result->mid_score = $row[2];
            $student_result->final_score = $row[3];
            array_push($result_list, $student_result);
        }
        return $result_list;
    }

    private function file2array($file): array
    {
        $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
        $fileSize = $file->getSize(); //Get size of uploaded file in bytes

        self::checkUploadedFileProperties($extension, $fileSize);
        $filename = $file->getClientOriginalName();

        $location = 'uploads';
        $file->move($location, $filename);
        $filepath = public_path($location . "/" . $filename);
        $file = fopen($filepath, "r");
        $importData_arr = array(); // Read through the file and store the contents as an array
        $i = 0;

        while( ($filedata = fgetcsv($file, 1000, ",") ) !== FALSE) {
            $numRow = count($filedata);
            // Skip first row (Remove below comment if you want to skip the first row)
            if ($i == 0) {
                $i++;
                continue;
            }

            for ($c = 0; $c < $numRow; $c++)
                $importData_arr[$i][] = $filedata[$c];
            $i++;
        }
        fclose($file); //Close after reading

        return $importData_arr;
    }

    private function checkUploadedFileProperties($extension, $fileSize)
    {
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
        $maxFileSize = 2097152; // Uploaded file size limit is 2mb
        if (in_array(strtolower($extension), $valid_extension)) {
            if ($fileSize <= $maxFileSize) {
            } else {
                throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
            }
        } else {
            throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
        }
    }
}
