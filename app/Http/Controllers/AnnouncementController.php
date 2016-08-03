<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('is_top','desc')->orderBy('post_at','desc')->get();
        return view('announcements.index', [
            'anns' => $announcements,
        ]);
    }

    public function store(Request $request)
    {
        $top = false;
        if ($request->top == 'on') {
            $top = true;
        }
        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'post_at' => $request->post_at,
            'is_top' => $top
        ]);

        return redirect('/ann');
    }

    public function destroy(Announcement $ann)
    {
        $ann->delete();
    }

    public function edit(Announcement $ann)
    {
        return view('announcements.edit', [
            'ann' => $ann
        ]);
    }

    public function update(Request $request, Announcement $ann)
    {
        $top = false;
        if ($request->top == 'on') {
            $top = true;
        }

        $ann->update([
            'title' => $request->title,
            'content' => $request->content,
            'post_at' => $request->post_at,
            'is_top' => $top
        ]);

        return redirect('/ann');
    }
}
