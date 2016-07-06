<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
		'departments_kind',
		'departments_intro',
	];

}