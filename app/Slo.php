<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $description
 * @property int $criteria
 * @property ClassSloClo[] $classSloClos
 * @property CloSlo[] $cloSlos
 */
class Slo extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slo';

    /**
     * @var array
     */
    protected $fillable = ['description', 'criteria'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classSloClos()
    {
        return $this->hasMany('App\ClassSloClo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cloSlos()
    {
        return $this->hasMany('App\CloSlo');
    }
}
