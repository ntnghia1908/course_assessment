<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $course_id
 * @property int $instructor_id
 * @property int $group
 * @property int $group_lab
 * @property int $semester
 * @property string $academic_year
 * @property int $group_theory
 * @property Course $course
 * @property Instructor $instructor
 * @property ClassAssessment $classAssessment
 * @property ClassAssessmentCourse[] $classAssessmentCourses
 * @property ClassSloClo[] $classSloClos
 * @property Result[] $results
 */
class ClassSession extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'class_session';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['course_id', 'instructor_id', 'group', 'group_lab', 'semester', 'academic_year', 'group_theory'];

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
    public function instructor()
    {
        return $this->belongsTo('App\Instructor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function classAssessment()
    {
        return $this->hasOne('App\ClassAssessment', 'class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classAssessmentCourses()
    {
        return $this->hasMany('App\ClassAssessmentCourse', 'class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classSloClos()
    {
        return $this->hasMany('App\ClassSloClo', 'class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function results()
    {
        return $this->hasMany('App\Result', 'class_id');
    }
}
