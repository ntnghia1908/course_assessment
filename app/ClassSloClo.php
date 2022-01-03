<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $class_id
 * @property int $clo_id
 * @property int $slo_id
 * @property float $percentage
 * @property LearningOutcome $learningOutcome
 * @property ClassSession $classSession
 * @property Slo $slo
 */
class ClassSloClo extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'class_slo_clo';

    /**
     * @var array
     */
    protected $fillable = ['percentage'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learningOutcome()
    {
        return $this->belongsTo('App\LearningOutcome', 'clo_id');
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
    public function slo()
    {
        return $this->belongsTo('App\Slo');
    }

    static function getClassAbetMapping($loList): array
    {
        $abetMapping = [];
        foreach ($loList as $lo) {
            $item = [];
            for($slo=1; $slo<7; $slo++) {
                $tem_sloClo = ClassSloClo::where([ ['clo_id', '=', $lo->id], ['slo_id' ,'=', $slo] ])->get();

                foreach ($tem_sloClo as $sloClo)
                    $item[$slo] = $sloClo->percentage; // NEED refactor
            }
            $abetMapping[$lo->id] = $item;
        }
        return $abetMapping;
    }
}
