<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Announcement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anns = Announcement::orderBy('is_top','desc')->orderBy('post_at','desc')->get();

        // 預覽公告內容欄位
        $anns = $anns->each(function ($item, $key) {
            $tmp = strip_tags($item->content); // html tag全移除
            $item->short_content=substr($tmp, 0, 10); // 只要前五個字
        });

        return view('home', [
            'anns' => $anns,
        ]);
    }

    public function change_bg()
    {
        return view('dashboard.background');
    }
    public function update_bg(Request $request)
    {
        $this->validate($request, [
            'bg1' => 'max:1024|mimes:jpeg',
            'bg2' => 'max:1024|mimes:jpeg',
            'bg3' => 'max:1024|mimes:jpeg'
        ],
        [
            'max' => ':attribute 的大小請小於1MB(1024KB)',
            'mimes' => ':attribute 請使用JPG檔'
        ]);

        if($request->hasFile('bg1')){
            $this->save_bg($request,'1');
        }
        if($request->hasFile('bg2')){
            $this->save_bg($request,'2');
        }
        if($request->hasFile('bg3')){
            $this->save_bg($request,'3');
        }
        return back();
    }
    public function save_bg(Request $request,$i)
    {
        $file = $request->file('bg'.$i);
        $img = \Image::make($file); // read img form file

        // 刪舊,存新
        $filepath = public_path('upload/home_bg/background'.$i.'.jpg');
        \File::delete($filepath);
        $img->save($filepath);
    }
}
