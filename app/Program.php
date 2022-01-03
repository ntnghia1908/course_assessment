<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $major_id
 * @property string $name
 * @property int $duration
 * @property string $version
 * @property string $type
 * @property Major $major
 * @property CourseProgram[] $coursePrograms
 */
class Program extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'program';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['major_id', 'name', 'duration', 'version', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function major()
    {
        return $this->belongsTo('App\Major');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coursePrograms()
    {
        return $this->hasMany('App\CourseProgram');
    }
}
