<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 * @property string $major
 * @property int $batch
 * @property Result[] $results
 */
class Student extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'student';

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
    protected $fillable = ['name', 'major', 'batch'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function results()
    {
        return $this->hasMany('App\Result');
    }
}
