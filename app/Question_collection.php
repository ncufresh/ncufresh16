<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_collection extends Model
{
    protected $table = 'question_collection';//name of table
    protected $fillable = ['question','selection_1','selection_2','answer'];
    
}
