<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\QandA;

class QandAController extends Controller
{
    public function index($input)
    {   
        if($input=='all')
            $QandAs = QandA::paginate(10);
        else
            $QandAs = QandA::where('classify',$input)->paginate(10);
        return view('Q&A.index', compact('QandAs'));
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
        return redirect(url('/Q&A/all'));
    }
    public function show($id)
    {
        $Q = QandA::where('id',$id)->first();
        $Q->click_count ++;
        $Q->save();
        return view('Q&A.show', compact('Q'));
    }
    // public function edit()
    // {
        
    // }
    // public function update()
    // {
        
    // }
    public function destroy($id)
    {
        $Q=QandA::find($id)->delete();
        return redirect(action('QandAController@index','all'));
    }
}
