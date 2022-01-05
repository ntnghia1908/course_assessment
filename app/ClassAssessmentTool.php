<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $assessment_id
 * @property int $lout_id
 * @property int $class_id
 * @property string $course_id
 * @property int $percentage
 * @property Assessment $assessment
 * @property ClassSession $classSession
 * @property LearningOutcome $learningOutcome
 */
class ClassAssessmentTool extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'class_assessment_tool';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['assessment_id', 'lout_id', 'class_id', 'course_id', 'percentage'];

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
    public function classSession()
    {
        return $this->belongsTo('App\ClassSession', 'class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learningOutcome()
    {
        return $this->belongsTo('App\LearningOutcome', 'lout_id');
    }

    static function getByClassAssessmentAndLO($classId, $loList): array
    {
        $newAssessmentTool = [];
//        $loList = ClassAssessment::distinct()->where(['class_id'=>$classId])->get('learning_outcome_id');
        $loList = ClassAssessment::distinct()
            ->where(['class_id'=>55])
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
