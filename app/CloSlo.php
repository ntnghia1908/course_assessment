<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $slo_id
 * @property int $lo_id
 * @property float $percentage
 * @property Slo $slo
 * @property LearningOutcome $learningOutcome
 */
class CloSlo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'clo_slo';

    /**
     * @var array
     */
    protected $fillable = ['percentage'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function slo()
    {
        return $this->belongsTo('App\Slo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learningOutcome()
    {
        return $this->belongsTo('App\LearningOutcome', 'lo_id');
    }
}
