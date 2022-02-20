<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $clo_id
 * @property int $slo_id
 * @property int $percentage
 * @property AsiinClo $asiinClo
 * @property Slo $slo
 */
class AsiinCloSlo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'asiin_closlo';

    /**
     * @var array
     */
    protected $fillable = ['percentage'];

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
    public function slo()
    {
        return $this->belongsTo('App\Slo');
    }
}
