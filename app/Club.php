<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
		'clubs_kind',
		'clubs_intro',
	];

	public function allclub(){
		return $this->hasMany('App\Allclub','clubs_id');
	}


}

	
