<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = array('building_id', 'buildingName', 'buildingExplain','imgUrl');
}
