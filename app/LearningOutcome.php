<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $course_id
 * @property string $description
 * @property string $description_vn
 * @property Course $course
 * @property AssessmentTool[] $assessmentTools
 * @property ClassAssessment[] $classAssessments
 * @property ClassSloClo[] $classSloClos
 * @property CloSlo[] $cloSlos
 */
class LearningOutcome extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'learning_outcome';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['course_id', 'description', 'description_vn'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assessmentTools()
    {
        return $this->hasMany('App\AssessmentTool', 'loutcome_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classAssessments()
    {
        return $this->hasMany('App\ClassAssessment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classSloClos()
    {
        return $this->hasMany('App\ClassSloClo', 'clo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cloSlos()
    {
        return $this->hasMany('App\CloSlo', 'lo_id');
    }
}
