<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit(){
        return view('users.edit', [
            'user' => Auth::user(),
        ]);
    }
    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required|max:10',
            'intro' => 'max:255'
        ]);

        if ($request->name) {
            $user = Auth::user();
            $user->name = $request->name;
            $user->intro  = $request->intro;
            $user->save();
        }

        if($request->hasFile('avatar')){
            // 抓取檔案
            $avatar = $request->file('avatar');

            // 非圖片就跳回去
            $is_img = (substr($avatar->getMimeType(), 0, 5) == 'image');
      			if (!$is_img) {
      				return back()->withInput();
      			}

            // 舊照刪刪
            $uploadFolder = public_path('upload/avatars/');//base_path().'/public/upload/avatar/';
      			$oldAvatar = Auth::user()->avatar;
      			if ($oldAvatar!='default.png' && file_exists($uploadFolder.$oldAvatar)){
      				  \File::delete($uploadFolder.$oldAvatar);
      			}

            // 新照加加
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $img = Image::make($avatar)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio(); // 依比例縮小
            });
            $img->save( $uploadFolder . $filename );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return back();
    }
    

}
