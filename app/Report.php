<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
    	'id',
        'filename',
        'comment',
        'fyp_id',
    ];
}
