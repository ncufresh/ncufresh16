<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Life_image extends Model
{
    protected $fillable = ['life_id','filename'];
    protected $table = "lives_images";
}
