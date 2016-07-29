<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PersonalController extends Controller
{
     public function index()
    {   
        
        return view('personal.index');
    }
     public function create()
    {   
        return view('personal.create');
    }
}
