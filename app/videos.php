<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    protected $fillable = [
    'videos_kind',
    'videos_intro',
    'videos'
    ];
}

