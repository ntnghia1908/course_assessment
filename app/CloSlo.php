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
    public $timestamps = false;
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

    static function getAbetMapping($loList): array
    {
        $abetMapping = [];
        foreach ($loList as $lo) {
            $item = [];
            for($slo=1; $slo<7; $slo++) {
                $tem_sloClo = CloSlo::where([ ['lo_id', '=', $lo->id], ['slo_id' ,'=', $slo] ])->get();

                foreach ($tem_sloClo as $sloClo)
                    $item[$slo] = $sloClo->percentage; // NEED refactor
            }
            $abetMapping[$lo->id] = $item;
        }
        return $abetMapping;
    }
}
