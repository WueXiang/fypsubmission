<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fyp extends Model
{
    protected $fillable = [
        
        'student_id',
        'title_id',
        'supervior_mark',
        'moderator_mark'
    ];

    public function fypparts()
    {
        return $this->hasMany('App\Fyppart');
    }

    public function project()
    {
        return $this->belongsTo('App\Title');
    }
}
