<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditMemberRequest;
use App\Http\Requests\MemberRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Members';
        $members = User::paginate(10);

        return view('member.index', compact('title', 'members'));
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
        $roles = Role::get();
        return view('member.create', compact('title', 'roles'));
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

}
