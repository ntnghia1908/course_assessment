<?php

namespace App\Http\Services;

use App\Result;

class ResultService {
    static function  readStudentScoreFromExcelFile($file): array
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

    static function file2array($file): array
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

    static function checkUploadedFileProperties($extension, $fileSize)
    {
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
//        $maxFileSize = 2097152; // Uploaded file size limit is 2mb
//        if (in_array(strtolower($extension), $valid_extension)) {
//            if ($fileSize <= $maxFileSize) {
//            } else {
//                throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
//            }
//        } else {
//            throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
//        }
    }

    static function getResultSummary($resultList): array
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

}
