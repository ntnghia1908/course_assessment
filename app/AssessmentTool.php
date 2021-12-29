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
}
