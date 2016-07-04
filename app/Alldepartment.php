<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alldepartment extends Model
{
   	protected $fillable = [
		'departments_name',
		'departments_content'
	];

	public function department(){
		return $this->belongsTo('App\Department');
	}
}
	
}
