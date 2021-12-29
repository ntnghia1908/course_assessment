<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $class_id
 * @property int $assessment_id
 * @property int $learning_outcome_id
 * @property int $precentage
 * @property Assessment $assessment
 * @property ClassSession $classSession
 * @property LearningOutcome $learningOutcome
 */
class ClassAssessment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'class_assessment';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'class_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['assessment_id', 'learning_outcome_id', 'precentage'];

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
        return $this->belongsTo('App\LearningOutcome');
    }
}
