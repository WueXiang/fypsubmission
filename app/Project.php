<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title_id', 'title_name', 'project_type', 'specialization','supervisor_id','co-supervisor_id','moderator_id'];
}
