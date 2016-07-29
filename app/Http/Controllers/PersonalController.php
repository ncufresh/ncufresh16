<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Auth;
use Image;

class PersonalController extends Controller
{
     public function index($id)
    {   
        $user = User::where('id',$id)->first();
        return view('personal.index',compact('user'));
    }
     public function viewOther()
    {
    	$users = User::get();
        return view('personal.viewOther',compact('users'));
    }
    public function updateBackground(Request $request){
        if($request->hasFile('background')){
            // 抓取檔案
            $background = $request->file('background');

            // 非圖片就跳回去
            $is_img = (substr($background->getMimeType(), 0, 5) == 'image');
                if (!$is_img) {
                    return back()->withInput();
                }

            // 舊照刪刪
            $uploadFolder = public_path('upload/background/');
                $oldbackground = Auth::user()->background;
                if ($oldbackground!='default.png' && file_exists($uploadFolder.$oldbackground)){
                      \File::delete($uploadFolder.$oldbackground);
                }

            // 新照加加
            $filename = time() . '.' . $background->getClientOriginalExtension();
            $img = Image::make($background)->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio(); // 依比例縮小
            });
            $img->save( $uploadFolder . $filename );
            $user = Auth::user();
            $user->background = $filename;
            $user->save();
        }
        return back();
    }
}
