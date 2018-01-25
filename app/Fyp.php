<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fyp extends Model
{
    protected $fillable = [
    	'id',
        'student_id',
        'project_id',
        'supervior_mark',
        'moderator_mark'
    ];
}
