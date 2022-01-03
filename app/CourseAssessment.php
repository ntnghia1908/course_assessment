<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $assessment_id
 * @property string $course_id
 * @property int $percentage
 * @property Course $course
 * @property Assessment $assessment
 */
class CourseAssessment extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_assessment';

    /**
     * @var array
     */
    protected $fillable = ['percentage'];

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
    public function assessment()
    {
        return $this->belongsTo('App\Assessment');
    }

    static function findCourseAssessmentByCourseWithoutComboAss($courseId, $loList): array
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
                $assessments[$as->assessment_id] = $as->percentage;

            $newAssessmentTool[$lo->id] = $assessments;
        }
        return $newAssessmentTool;
    }
}
