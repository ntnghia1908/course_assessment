<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $assessment_id
 * @property string $course_id
 * @property int $percentage
 */
class CourseAssessmentAsiin extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'course_assessment_asiin';

    /**
     * @var array
     */
    protected $fillable = ['percentage'];

}
