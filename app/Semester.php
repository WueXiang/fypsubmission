<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'id',
        'part',
        'start_date',
        'end_date',
    ];
}
