<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Title extends Model

{

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'title', 'type', 'specialization', 'supervisor_id',

    ];

}