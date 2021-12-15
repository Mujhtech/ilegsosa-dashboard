<?php

namespace App\Http\Controllers;

use App\Models\MessageThread;
use App\Models\Messaging;
use App\Models\Set;
use App\Models\SetMember;
use App\Models\User;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    //
    public function index(Request $request)
    {

        $data['title'] = "Connect with mates";

        //dd($request->user()->member);

        if ($request->user()->member) {

            $members = SetMember::where(['set_id' => $request->user()->set_id, 'status' => 1]);

            if ($request->query('s')) {
                $data['keyword'] = $request->query('s');
            }

            if ($request->query('chat')) {

                $connect = User::whereFullName($request->query('chat'))->first();

                //dd($connect);

                if (MessageThread::where('receiver_id', $request->user()->id)->orWhere('sender_id', $request->user()->id)->where('receiver_id', $connect->id)->orWhere('sender_id', $connect->id)->exists()) {

                    $data['conversations'] = MessageThread::with('messages')->where('receiver_id', $request->user()->id)->orWhere('sender_id', $request->user()->id)->where('receiver_id', $connect->id)->orWhere('sender_id', $connect->id)->first();

                    //dd($data['conversations']);

                }

                $data['receiver'] = $connect;

            } else {

                $data['conversations'] = MessageThread::with('messages')->where('set_id', $request->user()->set_id)->first();


            }

            $data['members'] = $members->where('user_id', '!=', $request->user()->id)->orderBy('created_at', 'DESC')->get();

            return view('connect.chat', $data);

        }

        $data['sets'] = Set::with(['members' => function ($q) {
            $q->where('status', 1);
        }])->where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('connect.index', $data);

    }

    public function requestAcess(Request $request)
    {

        if (!SetMember::where('user_id', $request->user()->id)->exists()) {

            $user = $request->user();
            $user->set_id = $request->set_id;

            $member = new SetMember;
            $member->set_id = $request->set_id;
            $member->user_id = $user->id;
            $member->status = get_setting('auto_connect');

            if ($member->save() && $user->save()) {

                flash('Request access has been sent, wait for admin approval')->success();
                return redirect()->back()->with('success', 'Request access has been sent, wait for admin approval');

            } else {

                flash('Cannot sent a request now, try again later')->error();
                return redirect()->back()->with('error', 'Cannot sent a request now, try again later');

            }

        } else {

            flash('Already a member of the set')->error();
            return redirect()->back()->with('error', 'Already a member of the set');

        }

    }

    public function store(Request $request)
    {

        $request->validate([
            'content' => 'required|string',
        ]);

        if ($request->message_type == 'private' && MessageThread::where('receiver_id', $request->user()->id)->orWhere('sender_id', $request->user()->id)->where('receiver_id', $request->receiver_id)->orWhere('sender_id', $request->receiver_id)->exists()) {

            $thread = MessageThread::where('receiver_id', $request->user()->id)->orWhere('sender_id', $request->user()->id)->where('receiver_id', $request->receiver_id)->orWhere('sender_id', $request->receiver_id)->first();

        } elseif ($request->message_type == 'public' && MessageThread::where('set_id', $request->user()->set_id)->exists()) {

            $thread = MessageThread::where('set_id', $request->user()->set_id)->first();

        } else {

            $thread = new MessageThread;
            $thread->code = $this->thread_code(10);
            if ($request->message_type == 'private') {

                $thread->receiver_id = $request->receiver_id;
                $thread->sender_id = $request->user()->id;

            } else {

                $thread->set_id = $request->user()->set_id;

            }

            $thread->save();

        }

        $message = new Messaging;
        $message->message_id = $thread->id;
        $message->content = $request->content;
        $message->user_id = $request->user()->id;
        $message->type = $request->message_type;
        $message->status = 1;
        $message->save();

        flash('Message sent')->success();
        return redirect()->back();

    }

    private function thread_code($length = 6)
    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {

            $randomString .= $characters[rand(0, $charactersLength - 1)];

        }

        return strtolower($randomString);

    }
}
