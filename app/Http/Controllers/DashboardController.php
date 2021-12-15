<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $announcements = Announcement::orderBy('created_at', 'DESC')->take(3)->get();
        $title = "Dashboard";
        return view('index', compact('title', 'announcements'));
    }
}
