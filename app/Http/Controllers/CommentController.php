<?php

namespace App\Http\Controllers;

use App\Models\CommentThread;
use App\Models\DiscussionThread;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        $request->validate([
            'content' => 'required|string',
        ]);

        if ($request->post_id) {

            $dis = DiscussionThread::find($request->post_id);
            $dis->comments()->create([
                'content' => $request->content,
                'status' => 1,
                'likes' => 0,
                'user_id' => $request->user()->id,
            ]);

        } else {

            $dis = CommentThread::find($request->comment_id);
            $dis->replys()->create([
                'content' => $request->content,
                'status' => 1,
                'likes' => 0,
                'user_id' => $request->user()->id,
            ]);

        }

        flash('You just replied this post')->success();
        return redirect()->back();

    }
}
