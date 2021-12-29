<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property int $course_level_id
 * @property string $name
 * @property string $name_vn
 * @property int $credit_theory
 * @property int $credit_lab
 * @property string $description
 * @property CourseLevel $courseLevel
 * @property AssessmentTool[] $assessmentTools
 * @property ClassSession[] $classSessions
 * @property CourseAssessment[] $courseAssessments
 * @property CourseProgram[] $coursePrograms
 * @property LearningOutcome[] $learningOutcomes
 */
class Course extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['course_level_id', 'name', 'name_vn', 'credit_theory', 'credit_lab', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
//    public function courseLevel()
//    {
//        return $this->belongsTo('App\CourseLevel');
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assessmentTools()
    {
        return $this->hasMany('App\AssessmentTool');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classSessions()
    {
        return $this->hasMany('App\ClassSession');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseAssessments()
    {
        return $this->hasMany('App\CourseAssessment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function courseLevel()
    {
        return $this->hasOne('App\CourseLevel', 'id', 'course_level_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coursePrograms()
    {
        return $this->hasMany('App\CourseProgram');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function learningOutcomes()
    {
        return $this->hasMany('App\LearningOutcome');
    }
}
