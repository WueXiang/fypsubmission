<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fyp extends Model
{
    protected $fillable = [

        'id',
        'student_id',
        'title_id',
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
