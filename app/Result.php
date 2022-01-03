<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $student_id
 * @property int $class_id
 * @property int $mid_score
 * @property int $final_score
 * @property int $in_class_score
 * @property int $GPA
 * @property int $abet_score
 * @property int $abet_1
 * @property int $abet_2
 * @property int $abet_3
 * @property int $abet_4
 * @property int $abet_5
 * @property int $abet_6
 * @property float $avg
 * @property ClassSession $classSession
 * @property Student $student
 */
class Result extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'result';

    /**
     * @var array
     */
    protected $fillable = ['mid_score', 'final_score', 'in_class_score', 'GPA', 'abet_score', 'abet_1', 'abet_2', 'abet_3', 'abet_4', 'abet_5', 'abet_6', 'avg'];

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
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
