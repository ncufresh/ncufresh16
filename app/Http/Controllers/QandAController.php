<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\QandA;

class QandAController extends Controller
{
    public function index()
    {
        $QandA = QandA::all();
        return view('Q&A.index', [
             'QandAs' => $QandA,
        ]);
    }
    public function create()
    {
        return view('Q&A.create');
    }
    public function store(Request $request)
    {
    	$Q = new QandA;
	    $Q->content = $request->content;
	    $Q->classify = $request->classify;
	    $Q->save();
        return redirect(action('QandAController@index'));
    }
    public function show()
    {
        
    }
    public function edit()
    {
        
    }
    public function update()
    {
        
    }
    public function destroy()
    {

    }
}
