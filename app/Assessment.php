<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property AssessmentTool[] $assessmentTools
 * @property ClassAssessment[] $classAssessments
 * @property ClassAssessmentCourse[] $classAssessmentCourses
 * @property CourseAssessment[] $courseAssessments
 */
class Assessment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'assessment';
    public $timestamps = false;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['type'];

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
    public function classAssessments()
    {
        return $this->hasMany('App\ClassAssessment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classAssessmentCourses()
    {
        return $this->hasMany('App\ClassAssessmentCourse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseAssessments()
    {
        return $this->hasMany('App\CourseAssessment');
    }

}
