<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\QandA;
use Auth;

class QandAController extends Controller
{
    /*
        顯示內容  (有許多種分類)
    */
    public function index($input)
    {   
        
        if($input=='all'){
            $QandAs = QandA::orderBy('created_at', 'desc')->paginate(10);
            $Top5 = QandA::orderBy('click_count', 'desc')->get();
        }else{
            $QandAs = QandA::where('classify',$input)->orderBy('created_at', 'desc')->paginate(10);
            $Top5 = QandA::where('classify',$input)->orderBy('click_count', 'desc')->get();
        }
        switch ($input) {
            case "all":
                $titles = "所有問題";
                break;
            case "dormitory":
                $titles = "宿舍生活";
                break;
            case "school":
                $titles = "校園生活";
                break;
            case "student":
                $titles = "學生事務";
                break;   
            case "other":
                $titles = "其他";
                break;
        }
        $count = ($Top5->count()>=5) ? 5 :  $Top5->count() ;
        return view('Q&A.index', compact('QandAs','Top5','titles','count'));
    }
    /*
        顯示內容  管理者
    */
    public function indexAdmin()
    {   
        $QandAs = QandA::orderBy('created_at', 'desc')->paginate(10);
        return view('Q&A.indexAdmin', compact('QandAs'));
    }
     /*
        顯示內容  個人發問紀錄
    */
    public function indexPersonal()
    {   
        if(empty(Auth::user()))
            echo "<script>window.alert('請先登入!');location.href='/login';</script>";
        $QandAs = QandA::where('asked_id' , Auth::user()->id )->orderBy('created_at', 'desc')->paginate(10);
        return view('Q&A.indexPersonal', compact('QandAs'));
    }
    /*
        跳轉到新增問題的頁面  
    */
    public function create()
    {
        if(empty(Auth::user()))
            echo "<script>window.alert('請先登入!');location.href='/login';</script>";
        return view('Q&A.create');
    }
    /*
        儲存問題 
    */
    public function store(Request $request)
    {
    	$Q = new QandA;
        $Q->asked_id = Auth::user()->id;
        $Q->topic = $request->topic;
	    $Q->content = $request->content;
	    $Q->classify = $request->classify;
	    $Q->save();
        return redirect(url('/Q&A/all'));
    }
    /*
        更新問題
    */
    public function update(Request $request,QandA $Q)
    {
        if(!empty($request->topic))
            $Q->topic = $request->topic;
        if(!empty($request->content))
            $Q->content = $request->content;
        if(!empty($request->classify))
            $Q->classify = $request->classify;
        if(!empty($request->response))
            $Q->response = $request->response;
        $Q->save();
        return redirect(url('/Q&A/content/'.$Q->id));
    }
    /*
        顯示單一個問題的詳細內容
    */
    public function show(QandA $Q)
    {
        $Q->click_count ++;
        $Q->save();
        return view('Q&A.show', compact('Q'));
    }
    public function edit(QandA $Q)
    {
        return view('Q&A.edit', compact('Q'));
    }
    /*
        刪除單一個問題
    */
    public function destroy(QandA $Q)
    {
        $Q->delete();
        return redirect(action('QandAController@indexAdmin','all'));
    }
}
