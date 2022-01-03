<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $class_id
 * @property int $assessment_id
 * @property int $percentage
 * @property int $lo_id
 * @property int $slo_id
 * @property Assessment $assessment
 * @property ClassSession $classSession
 */
class ClassAssessmentCourse extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'class_assessment_course';

    /**
     * @var array
     */
    protected $fillable = ['percentage', 'lo_id', 'slo_id'];

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
}
