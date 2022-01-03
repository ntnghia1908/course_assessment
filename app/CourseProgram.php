<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $course_id
 * @property int $program_id
 * @property string $course_code
 * @property int $course_type_id
 * @property Course $course
 * @property Program $program
 */
class CourseProgram extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_program';
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['course_code', 'course_type_id'];

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
    public function program()
    {
        return $this->belongsTo('App\Program');
    }
}
