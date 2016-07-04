<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allclub extends Model
{
    protected $fillable = [
		'clubs_name',
		'clubs_content'
	];

	public function club(){
		return $this->belongsTo('App\Club');
	}
}
