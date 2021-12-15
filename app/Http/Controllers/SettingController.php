<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "System Setting";
        $settings = Setting::get();
        return view('setting.index', compact('title', 'settings'));

    }

    public function store(Request $request)
    {
        //
        //dd($request->all());

        $setting = Setting::get();

        foreach ($setting as $set) {

            if ($set->type == "site_favicon" && $request->hasFile('site_favicon')) {

                if ($set->value != null && $set->value != "" && Storage::exists($set->value)) {

                    Storage::delete($set->value);

                }

                $logo = Setting::where('type', 'site_favicon')->first();
                $logo->value = 'public/uploads/favicon/favicon.png';
                $logo->save();

                $request->file('site_favicon')->storeAs(
                    'public/uploads/favicon', 'favicon.png'
                );

            } elseif ($set->type == "site_logo" && $request->hasFile('site_logo')) {

                if ($set->value != null && $set->value != "" && Storage::exists($set->value)) {

                    Storage::delete($set->value);

                }

                $logo = Setting::where('type', 'site_logo')->first();
                $logo->value = 'public/uploads/logo/logo.png';
                $logo->save();

                $request->file('site_logo')->storeAs(
                    'public/uploads/logo', 'logo.png'
                );

            } elseif ($set->type == "site_background_image" && $request->hasFile('site_background_image')) {

                if ($set->value != null && $set->value != "" && Storage::exists($set->value)) {

                    Storage::delete($set->value);

                }

                $logo = Setting::where('type', 'site_background_image')->first();
                $logo->value = 'public/uploads/bg/site_background_image.png';
                $logo->save();

                $request->file('site_background_image')->storeAs(
                    'public/uploads/bg', 'site_background_image.png'
                );

            } elseif ($set->type == "new_user_verification" && $request->has($set->type)) {

                $set->value = $request->input('new_user_verification');

                $set->save();

            } elseif ($set->type == "start_election" && $request->has($set->type)) {

                $set->value = $request->input('start_election');

                $set->save();

            } elseif ($request->has($set->type) && $request->input($set->type) != "" && $set->type != "site_logo" && $set->type != "site_favicon") {

                $set->value = $request->input($set->type);

                $set->save();

            } else {

                continue;

            }

        }

        flash('Setting save successfully')->success();
        return redirect()->back();
    }

}
