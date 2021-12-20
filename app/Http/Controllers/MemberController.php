<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditMemberRequest;
use App\Http\Requests\MemberRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SetMember;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = 'Members';

        if ($request->query('s')) {
            $data['keyword'] = $request->query('s');
            $data['members'] = User::whereFullName($request->query('s'))->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $data['members'] = User::orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('member.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'New Member';
        $roles = Role::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('member.create', compact('title', 'roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        //
        $request->validated();

        $user = $request->user_id ? User::find($request->user_id) : new User;

        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_id = $request->role;
        $user->verified = $request->has('verify') ? 1 : 0;

        $user->password = $request->password;

        if ($user->save()) {

            if ($request->user_id) {
                flash('User editted successfully')->success();
            } else {
                flash('User created successfully')->success();
            }

            return redirect()->back();

        } else {

            flash('Something went wrong, try again later')->success();
            return redirect()->back();

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $title = 'Edit Member';
        $roles = Role::get();
        $member = User::findOrFail($id);

        return view('member.edit', compact('title', 'member', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditMemberRequest $request)
    {
        //
        $request->validated();

        $user = $request->user_id ? User::find($request->user_id) : new User;

        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_id = $request->role;
        $user->verified = $request->has('verify') ? 1 : 0;

        if ($request->has('password')) {
            $user->password = $request->password;
        }

        if ($user->save()) {

            if ($request->user_id) {
                flash('User editted successfully')->success();
            } else {
                flash('User created successfully')->success();
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
        $users = User::whereIn('id', $selected)->get();
        foreach ($users as $user) {

            if ($request->action == 'verify') {

                $user->verified = 1;
                $user->save();

            } elseif ($request->action == 'unverify') {

                $user->verified = 0;
                $user->save();

            } elseif ($request->action == 'block') {

                $user->active = 0;
                $user->save();

            } elseif ($request->action == 'unblock') {

                $user->active = 1;
                $user->save();

            }

        }

        flash('Users updated successfully')->success();
        return redirect()->back();
    }

    public function status($id)
    {

        $user = User::find($id);

        $user->active = $user->active ? 0 : 1;

        if ($user->save()) {

            flash('User editted successfully')->success();

            return redirect()->back();

        } else {

            flash('Something went wrong, try again later')->success();
            return redirect()->back();

        }
    }

    public function grantAccess($id)
    {

        $member = SetMember::where('user_id', $id)->first();

        $member->status = 1;

        if ($member->save()) {

            flash('Access granted successfully')->success();

            return redirect()->back();

        } else {

            flash('Something went wrong, try again later')->success();
            return redirect()->back();

        }

    }

}
