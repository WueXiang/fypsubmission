<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetinglog extends Model
{
    protected $fillable = [
        'meeting_date',
        'work_done',
        'work_to_be_done',
        'problem_encountered',
        'comment',
        'fyp_id'
    ];
}
