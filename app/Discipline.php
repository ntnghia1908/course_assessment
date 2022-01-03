<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Major[] $majors
 */
class Discipline extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'discipline';
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function majors()
    {
        return $this->hasMany('App\Major');
    }
}
