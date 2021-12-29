<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const STUDENT = 3;
    const LECTURER = 2;
    const ADMIN = 1;
    protected $fillable = ['name'];
}
