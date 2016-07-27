<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Document extends Model {
    protected $fillable = [
		'title',
		'content',
		'is_graduate',
		'position_of_main'
	];
}
