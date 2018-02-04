<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
    	'id',
        'filename',
        'original_filename',
        'fyp_id',
    ];
}
