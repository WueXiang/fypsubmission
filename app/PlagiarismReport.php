<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlagiarismReport extends Model
{
    protected $fillable = [
    	'id',
        'filename',
        'fyp_id',
    ];
}
