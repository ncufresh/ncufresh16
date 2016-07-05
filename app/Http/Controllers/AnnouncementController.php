<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('announcements.index', [
            'anns' => $announcements,
        ]);
    }

    public function store(Request $request)
    {

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('/ann');
    }
}
