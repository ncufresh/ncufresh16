<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QandA extends Model
{
    protected $fillable = ['content','classify'];
    protected $table = "QandA";
}
