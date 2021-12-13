<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class UserController extends Controller
{
    //

    public function updateProfile(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required',
            'avatar' => 'mimes:jpg,png|file|max:1024',
        ]);

        $user = $request->user();
        $user->phone = $request->phone_number;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {

            if (Storage::exists($user->avatar)) {

                Storage::delete($user->avatar);

            }

            $pp = time() . '_' . $user->username . '_avatar';
            $user->avatar = $request->file('avatar')->storeAs(
                'public/uploads/avatars', $pp . '.jpg'
            );

        }

        if ($user->save()) {

            flash('Profile updated successfully')->success();
            return redirect()->back()->with('success', 'Profile updated successfully');

        }
    }

    public function updatePassword(Request $request)
    {
        //
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|max:120|min:8',
            'new_password2' => 'required|string|max:120|min:8|same:new_password',
        ]);

        $user = $request->user();

        if (!Hash::check($request->old_password, $user->password)) {

            flash('Incorrect old password')->error();
            return redirect()->back()->with('error', 'Incorrect old password');

        }

        $user->password = $new_password;

        if ($user->save()) {

            flash('Password changed successfully')->success();
            return redirect()->back()->with('success', 'Password changed successfully');

        }
    }
}
