<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable
{
    use ShinobiTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'student_id', 'unit', 'real_name', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
