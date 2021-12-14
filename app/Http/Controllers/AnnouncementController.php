<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = "Announcements";
        if ($request->user()->role_id == 1 || $request->user()->role_id == 2) {
            $announcements = Announcement::paginate(10);
        } else {
            $announcements = Announcement::where('status', 1)->paginate(10);
        }

        return view('announcement.index', compact('title', 'announcements'));
    }

    public function create(Request $request)
    {

        $title = "Create new announcement";
        return view('announcement.create', compact('title'));

    }

    public function edit(Request $request, $id)
    {

        $title = "Edit announcement";
        $announcement = Announcement::findOrFail($id);
        return view('announcement.edit', compact('title', 'announcement'));

    }

    public function store(AnnouncementRequest $request)
    {

        $request->validated();

        $post = $request->post_id ? Announcement::find($request->post_id) : new Announcement;

        if ($request->post_id && $post->title == $request->title) {

            $post->title = $request->title;

        } else {

            $post->title = $request->title;
        }

        $post->content = $request->content;
        $post->status = $request->has('draft') ? 0 : 1;
        $post->user_id = $request->user()->id;

        if ($post->save()) {

            if ($request->post_id) {
                flash('Announcement editted successfully')->success();
            } else {
                flash('Announcement created successfully')->success();
            }

            return redirect()->back();

        } else {

            flash('Something went wrong, try again later')->success();
            return redirect()->back();

        }

    }
}
