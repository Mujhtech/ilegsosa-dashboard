<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\DiscussionThread;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //
    public function index(Request $request)
    {
        $data['title'] = "Announcements";
        if ($request->user()->role_id == 1 || $request->user()->role_id == 2) {

            if ($request->query('s')) {
                $data['keyword'] = $request->query('s');

                $data['announcements'] = Announcement::where('title', 'LIKE', '%' . $request->query('s') . '%')->orderBy('created_at', 'DESC')->paginate(10);

            } else {
                $data['announcements'] = Announcement::orderBy('created_at', 'DESC')->paginate(10);
            }

        } else {
            $data['announcements'] = Announcement::where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('announcement.index', $data);
    }

    public function create(Request $request)
    {

        $title = "Create new announcement";
        $featureds = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->take(3)->get();

        $most_reads = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'most_read' => 1])->orderBy('created_at', 'DESC')->take(3)->get();
        return view('announcement.create', compact('title', 'featureds', 'most_reads'));

    }

    public function edit(Request $request, $id)
    {

        $title = "Edit announcement";
        $announcement = Announcement::findOrFail($id);
        $featureds = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->take(3)->get();

        $most_reads = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'most_read' => 1])->orderBy('created_at', 'DESC')->take(3)->get();
        return view('announcement.edit', compact('title', 'announcement', 'featureds', 'most_reads'));

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

    public function groupUpdate(Request $request)
    {
        //

        $selected = explode(',', $request->selected);
        $announcements = Announcement::whereIn('id', $selected)->get();
        foreach ($announcements as $announcement) {

            if ($request->action == 'publish') {

                $announcement->status = 1;
                $announcement->save();

            } elseif ($request->action == 'draft') {

                $announcement->status = 0;
                $announcement->save();

            } elseif ($request->action == 'pending') {

                $announcement->status = 2;
                $announcement->save();

            } elseif ($request->action == 'trash') {

                $announcement->delete();

            }

        }

        flash('Announcements updated successfully')->success();
        return redirect()->back();
    }
}
