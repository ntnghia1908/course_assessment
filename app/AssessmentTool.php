<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $assessment_id
 * @property string $course_id
 * @property int $loutcome_id
 * @property float $percentage
 * @property Assessment $assessment
 * @property Course $course
 * @property LearningOutcome $learningOutcome
 */
class AssessmentTool extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'assessment_tool';

    /**
     * @var array
     */
    protected $fillable = ['percentage'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assessment()
    {
        return $this->belongsTo('App\Assessment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learningOutcome()
    {
        return $this->belongsTo('App\LearningOutcome', 'loutcome_id');
    }

    static function getByCourseAssessmentAndLO($courseId, $loList): array
    {
        $newAssessmentTool = [];
        foreach($loList as $lo) {
            $ast = AssessmentTool::where([
                ['course_id', '=', $courseId],
                ['loutcome_id', '=', $lo->id],
                ['assessment_id', '<>', 10],
            ])->get();

            $assessments =[];
            foreach($ast as $as)
                $assessments[$as->assessment_id] = $as->precentage;

            $newAssessmentTool[$lo->id] = $assessments;
        }
        return $newAssessmentTool;
    }

    static function getCourseAssessmentAndLO($classId): array
    {
        $newAssessmentTool = [];
//        $loList = ClassAssessment::distinct()->where(['class_id'=>$classId])->get('learning_outcome_id');
        $loList = ClassAssessment::distinct()
            ->where(['class_id'=>$classId])
            ->get('learning_outcome_id')
            ->pluck('learning_outcome_id')
            ->toArray();


        foreach($loList as $lo) {

            $ast = ClassAssessment::where([
                ['class_id', '=', $classId],
                ['learning_outcome_id', '=', $lo],
                ['assessment_id', '<>', 10],
            ])->get();
//            dump($ast);

            $assessments =[];
            foreach($ast as $as)
                $assessments[$as->assessment_id] = $as->precentage;

            $newAssessmentTool[$lo] = $assessments;
        }
//        dump($newAssessmentTool);

        return $newAssessmentTool;
    }
}
