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
}
