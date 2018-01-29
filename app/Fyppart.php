<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fyppart extends Model
{
    protected $fillable = [

        'fyp_id',
        'part',
        'supervior_mark',
        'moderator_mark',
    ];

    public function meetinglogs()
    {
        return $this->hasMany('App\Meetinglog');
    }

    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    public function plagiarism_reports()
    {
        return $this->hasMany('App\Plagiarism_Report');
    }
}
