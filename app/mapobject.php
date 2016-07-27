<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapobject extends Model
{
    protected $fillable=[
        "Building_id",
        "Xcoordinate",
        "Ycoordinate",
        "objWidth",
        "objImg",
    ];
    
    public function Building()
    {
        return $this->belongsTo('App\Building');
    }
}
