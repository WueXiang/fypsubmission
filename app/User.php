<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','specialization',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'is_lecturer' => 'boolean',
    ];
    
    public function isAdmin()
    {
        return $this->admin; // this looks for an admin column in your users table
    }

    public function isLecturer()
    {
        return $this->lecturer; // this looks for an admin column in your users table
    }
    // public function fyp()
    // {
    //     return $this->hasOne('App\Fyp');
    // }
}
