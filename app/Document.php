<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Document extends Model {
    protected $fillable = [
		'title',
		'content',
		'position_of_screen',
		'position_of_main'
	];
}
