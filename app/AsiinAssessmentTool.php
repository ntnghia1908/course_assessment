<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $clo_id
 * @property string $course_id
 * @property int $assessment_id
 * @property int $percentage
 * @property Assessment $assessment
 * @property AsiinClo $asiinClo
 * @property Course $course
 */
class AsiinAssessmentTool extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'asiin_assessment_tool';

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
    public function asiinClo()
    {
        return $this->belongsTo('App\AsiinClo', 'clo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
