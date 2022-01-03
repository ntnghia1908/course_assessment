<?php

namespace App\Http\Services;

//use Illuminate\Database\Eloquent\Model;

class GradingService {

    // CALCULATE THE GPA OF LIST OF STUDENTS//
    static function calculateGPA($student, $courseAssessmentList) {
        $assignment_weight = 0;
        $midterm_weight=0;
        $final_weight=0;

        foreach ($courseAssessmentList as $ca) {
            switch ($ca->assessment_id) {
                case 4:
                    $midterm_weight = $ca->percentage;
                    break;
                case 6:
                    $final_weight = $ca->percentage;
                    break;
            }
        }
        $assignment_weight = 100 - $midterm_weight- $final_weight;

        $gpa = (($assignment_weight * $student->in_class_score
                + $midterm_weight * $student->mid_score
                + $final_weight * $student->final_score) * 0.01);

        $student->gpa = round($gpa);

        return $student;
    }

    // CACLUATE THE ABET SCORE OF STUDENT//
    //1. Calculate the Course Learning Outcome Score of each student
    //1.1. Convert the assessment tools table into 3 types of assessment
    static function convertAssessmentCourseToHashTable($courseAssessmentList): array
    {
        $assessment_list = [];
        foreach($courseAssessmentList as $ca)
            $assessment_list[$ca->assessment_id] = (float) $ca->percentage;

        return $assessment_list;
    }

    static function convertAssessmentToolTable($assessmentToolList, $courseAssessmentList): array
    {
        $course_ass_list = self::convertAssessmentCourseToHashTable( $courseAssessmentList);
        $convert_assignment_at = [];

        foreach($assessmentToolList as $cat) {
            $new_inclass = 0.0;
            $new_midterm = 0.0;
            $new_final = 0.0;
            $item = [];

            foreach($assessmentToolList as $at) {
                if($cat->lout_id == $at->lout_id) {
                    if($at->assessment_id != 4 && $at->assessmentId != 6)
                        $new_inclass += $at->percentage * self::getNumberFromDict($course_ass_list, $at->assessment_id);
                    else {
                        if($at->assessment_id == 4)
                            $new_midterm = $at->percentage * self::getNumberFromDict($course_ass_list, 4);
                        else
                            $new_final = $at->percentage * self::getNumberFromDict($course_ass_list, 6);
                    }
                }
            }
            $item[10] = $new_inclass / ($new_inclass + $new_midterm + $new_final);
            $item[4] = $new_midterm / ($new_inclass + $new_midterm + $new_final);
            $item[6] = $new_final / ($new_inclass + $new_midterm + $new_final);
            $convert_assignment_at[$cat->lout_id] = $item;
        }
        return $convert_assignment_at;
    }

    static function calculateLearningOutcomeScore($assessment_tools, $course_assessment, $studentResult): array
    {
        $list_LO_scores = [];
        $convert_assignment_at =  self::convertAssessmentToolTable($assessment_tools, $course_assessment);
        $list_loId = array_keys($convert_assignment_at);

        foreach ($list_loId as $learningOutcomeID) {
            $weights = $convert_assignment_at[ (int)$learningOutcomeID ];

            $score = self::getNumberFromDict($weights,10)  * $studentResult->in_class_score
                + self::getNumberFromDict($weights, 4) * $studentResult->mid_score
                + self::getNumberFromDict($weights, 6) * $studentResult->final_score;

            $list_LO_scores[$learningOutcomeID] = $score;
        }
        return $list_LO_scores;
    }

    //2. Calculate the ABET score of Student
    //2.1. Convert ABET mapping table into Hashtable
    static function transferAndConvertAbetMapping($abetMapping): array
    {
        $sumPercentageOfEachCriteria = [];
        $abetMappingAfterConvert = [];

        foreach ($abetMapping as $cloSlo) {
            $total_weight = 0.0;
            foreach ($abetMapping as $item) {
                if($cloSlo->slo_id == $item->slo_id)
                    $total_weight += $item->percentage;
            }
            $sumPercentageOfEachCriteria[$cloSlo->slo_id] = $total_weight;
        }

        foreach ($abetMapping as $cloSlo) {
            $newAbetMapping = [];
            foreach ($abetMapping as $item) {
                if ($item->slo_id == $cloSlo->slo_id)
                    $newAbetMapping[$item->slo_id] = (float)$item->percentage / $sumPercentageOfEachCriteria[$cloSlo->slo_id];
            }
            $abetMappingAfterConvert[$cloSlo->slo_id] = $newAbetMapping;
        }
        return$abetMappingAfterConvert;
    }

    //2.2 Calculate ABET score
    static function storeStudentAbetResult ($student, $abetScore) {
        $listAbetCriteria = array_keys($abetScore);

        foreach($listAbetCriteria as $criteria) {
            switch ($criteria){
                case 1:
                    $student->abet_1 = round($abetScore[$criteria]);
                    break;
                case 2:
                    $student->abet_2 = round($abetScore[$criteria]);
                    break;
                case 3:
                    $student->abet_3 = round($abetScore[$criteria]);
                    break;
                case 4:
                    $student->abet_4 = round($abetScore[$criteria]);
                    break;
                case 5:
                    $student->abet_5 = round($abetScore[$criteria]);
                    break;
                case 6:
                    $student->abet_6 = round($abetScore[$criteria]);
                    break;
            }
        }
        return $student;
    }

    static function getNumberFromDict($dict, $key): float
    {
        $result = 0.0;
        if ($dict!=null)
            $result = (float) $dict[$key];
        return $result;
    }

    static function calculateAbetScoreOfStudent($assessmentToolList,$courseAssessmentList,$student,$cloSlo) {
        $learningOutcomeScore = self::calculateLearningOutcomeScore($assessmentToolList, $courseAssessmentList, $student);
        $newAbetMapping = self::transferAndConvertAbetMapping($cloSlo);

        $abetScore = [];
        $abetCriteria = array_keys($newAbetMapping);
        $totalScore = 0.0;

        foreach ($abetCriteria as $criteria) {
            $score = 0.0;
            $abetPercentage = $newAbetMapping[$criteria];
            $learningOutcomeId = array_keys($abetPercentage);

            foreach ($learningOutcomeId as $lo_id)
                $score += $abetPercentage[$lo_id] * $learningOutcomeScore[$lo_id];

            $abetScore[$criteria] = $score;
            $totalScore += $score;
        }

        self::storeStudentAbetResult($student, $abetScore);
        $student->abet_score = round( ($totalScore / count($abetCriteria)) );
        return $student;
    }
}
