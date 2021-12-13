<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = "Announcements";
        $announcements = Announcement::get();
        return view('announcement.index', compact('title', 'announcements'));
    }
}
