<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fyp1 extends Model
{
    protected $fillable = [
        'student_id',
        'project_id',
        'supervior_mark',
        'moderator_mark'
    ];
}
