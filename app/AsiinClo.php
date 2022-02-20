<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $description
 * @property AsiinAssessmentTool[] $asiinAssessmentTools
 * @property AsiinCloslo[] $asiinCloslos
 */
class AsiinClo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'asiin_clo';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asiinAssessmentTools()
    {
        return $this->hasMany('App\AsiinAssessmentTool', 'clo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asiinCloslos()
    {
        return $this->hasMany('App\AsiinCloslo', 'clo_id');
    }
}
