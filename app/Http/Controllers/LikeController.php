<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscussionThread;
use App\Models\CommentThread;

class LikeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($type, $id)
    {
        //
        $post = $type == 'post' ? DiscussionThread::find($id) : CommentThread::find($id);
        $post->likes += 1;

        if ($post->save()) {

            flash('Liked successfully')->success();
            return redirect()->back();

        } else {

            flash('Something went wrong, try again later')->success();
            return redirect()->back();

        }


    }
}
