<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscussionRequest;
use App\Models\Category;
use App\Models\DiscussionThread;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    //
    public function index(Request $request)
    {

        $title = "Discussion Thread";
        $categories = Category::get();

        $featureds = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->take(3)->get();

        $most_reads = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'most_read' => 1])->orderBy('created_at', 'DESC')->take(3)->get();

        if ($request->query('category')) {

            $category = Category::where('slug', $request->query('category'))->first();

            $discussions = DiscussionThread::with(['user', 'category', 'comments'])->where('status', 1)->where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(10);

        } else {

            $discussions = DiscussionThread::with(['user', 'category', 'comments'])->where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
        }

        if ($request->query('s')) {

            if ($request->user()->role_id == 1 || $request->user()->role_id == 2) {
                $my_posts = DiscussionThread::with(['user', 'category', 'comments'])->where('title', 'LIKE', '%' . $request->query('s') . '%')->orderBy('created_at', 'DESC')->paginate(10);
            } else {
                $my_posts = DiscussionThread::with(['user', 'category', 'comments'])->where(['user_id' => $request->user()->id])->where('title', 'LIKE', '%' . $request->query('s') . '%')->orderBy('created_at', 'DESC')->paginate(10);
            }

        } else {

            if ($request->user()->role_id == 1 || $request->user()->role_id == 2) {
                $my_posts = DiscussionThread::with(['user', 'category', 'comments'])->orderBy('created_at', 'DESC')->paginate(10);
            } else {
                $my_posts = DiscussionThread::with(['user', 'category', 'comments'])->where(['user_id' => $request->user()->id])->orderBy('created_at', 'DESC')->paginate(10);
            }

        }

        return view('discussion.index', compact('title', 'categories', 'discussions', 'my_posts', 'most_reads', 'featureds'));

    }

    public function single($slug)
    {

        $featureds = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->take(3)->get();

        $most_reads = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'most_read' => 1])->orderBy('created_at', 'DESC')->take(3)->get();

        $discussion = DiscussionThread::with(['user', 'category', 'comments'])->where('slug', $slug)->first();
        $title = 'Re: ' . $discussion->title;
        return view('discussion.single', compact('title', 'discussion', 'most_reads', 'featureds'));

    }

    public function create()
    {

        $title = "Create Discussion Thread";
        $categories = Category::get();
        $featureds = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->take(3)->get();

        $most_reads = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'most_read' => 1])->orderBy('created_at', 'DESC')->take(3)->get();
        return view('discussion.create', compact('title', 'categories', 'most_reads', 'featureds'));

    }

    public function edit($id)
    {

        $title = "Edit Discussion Thread";
        $discussion = DiscussionThread::findOrFail($id);
        $categories = Category::get();
        $featureds = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->take(3)->get();

        $most_reads = DiscussionThread::with(['user', 'category', 'comments'])->where(['status' => 1, 'most_read' => 1])->orderBy('created_at', 'DESC')->take(3)->get();
        return view('discussion.edit', compact('title', 'discussion', 'categories', 'most_reads', 'featureds'));

    }

    public function store(DiscussionRequest $request)
    {

        $request->validated();

        $post = $request->post_id ? DiscussionThread::find($request->post_id) : new DiscussionThread;

        if ($request->post_id && $post->title == $request->title) {

            $post->title = $request->title;

        } else {

            $post->title = $request->title;
            $post->slug = $this->generate_slug($request->title);
        }

        $post->content = $request->content;
        $post->status = $request->has('draft') ? 0 : 1;
        if (!$request->has('post_id')) {
            $post->likes = 0;
        }
        $post->user_id = $request->user()->id;
        $post->category_id = $request->category;

        if ($post->save()) {

            if ($request->post_id) {
                flash('Discussion editted successfully')->success();
            } else {
                flash('Discussion created successfully')->success();
            }

            return redirect()->back();

        } else {

            flash('Something went wrong, try again later')->success();
            return redirect()->back();

        }

    }

    private function generate_slug($title, $length = 6)
    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {

            $randomString .= $characters[rand(0, $charactersLength - 1)];

        }

        return str_replace(' ', '-', strtolower($title)) . '-' . strtolower($randomString);

    }

    public function groupUpdate(Request $request)
    {
        //

        $selected = explode(',', $request->selected);
        $discussions = DiscussionThread::whereIn('id', $selected)->get();
        foreach ($discussions as $discussion) {

            if ($request->action == 'publish') {

                $discussion->status = 1;
                $discussion->save();

            } elseif ($request->action == 'draft') {

                $discussion->status = 0;
                $discussion->save();

            } elseif ($request->action == 'pending') {

                $discussion->status = 2;
                $discussion->save();

            } elseif ($request->action == 'featured') {

                $discussion->featured = 1;
                $discussion->save();

            } elseif ($request->action == 'most_read') {

                $discussion->most_read = 1;
                $discussion->save();

            } elseif ($request->action == 'trash') {

                $discussion->delete();

            }

        }

        flash('Discussions updated successfully')->success();
        return redirect()->back();
    }

}
