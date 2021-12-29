<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $degree
 * @property string $email
 * @property Account[] $accounts
 * @property ClassSession[] $classSessions
 */
class Instructor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instructor';
    public $timestamps = false;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'degree', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classSessions()
    {
        return $this->hasMany('App\ClassSession');
    }
}
