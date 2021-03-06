<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Nomination;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = "Cast Vote";
        $designations = Designation::with('nominations')->get();

        if (get_setting('start_election')) {
            return view('vote.index', compact('title', 'designations'));
        } else {
            return view('vote.empty', compact('title', 'designations'));
        }

    }

    public function manage(Request $request)
    {

        $title = "Manage Vote/Nomination";
        $designations = Designation::get();
        $nominations = Nomination::paginate(10);
        $users = User::get();
        return view('vote.manage', compact('title', 'designations', 'nominations', 'users'));

    }

    public function store(Request $request)
    {
        //dd($request->all());
        foreach (Designation::get() as $designation) {

            if ($request->has(str_replace(' ', '_', strtolower($designation->title)))) {
                $re = str_replace(' ', '_', strtolower($designation->title));

                //echo $request->$re;

                $nominee = Nomination::find($request->$re);

                if (!Vote::where('nomination_id', $nominee->id)->where('year', $nominee->year)->where('voter_id', $request->user()->id)->exists()) {
                    $nominee->votes += 1;
                    $nominee->save();

                    $vote = new Vote;
                    $vote->nomination_id = $nominee->id;
                    $vote->voter_id = $request->user()->id;
                    $vote->year = $nominee->year;
                    $vote->status = 1;
                    $vote->save();
                } else {
                    continue;
                }

            } else {
                continue;
            }

        }

        flash('Voted successfully')->success();
        return redirect()->back();

    }

    public function nominate(Request $request)
    {

        $no = new Nomination;
        $no->user_id = $request->nominate;
        $no->designation_id = $request->designation;
        $no->year = $request->year;

        if ($no->save()) {
            flash('Save successfully')->success();
            return redirect()->back();
        } else {
            flash('Something went wrong, try again later')->success();
            return redirect()->back();
        }

    }

    public function designate(Request $request)
    {

        $de = new Designation;
        $de->title = $request->title;
        $de->status = 1;

        if ($de->save()) {
            flash('Save successfully')->success();
            return redirect()->back();
        } else {
            flash('Something went wrong, try again later')->success();
            return redirect()->back();
        }

    }

    public function declareWinner(Request $request, $id)
    {

        $no = Nomination::findOrFail($id);
        $no->win = 1;

        if ($no->save()) {
            flash('Save successfully')->success();
            return redirect()->back();
        } else {
            flash('Something went wrong, try again later')->success();
            return redirect()->back();
        }

    }

    public function destroyDesignate(Request $request, $id)
    {

        foreach (Nomination::where('designation_id', $id)->get() as $nominate) {
            $nominate->delete();
        }

        $de = Designation::findOrFail($id);

        if ($de->delete()) {
            flash('Save successfully')->success();
            return redirect()->back();
        } else {
            flash('Something went wrong, try again later')->success();
            return redirect()->back();
        }

    }

    public function destoryNominate(Request $request, $id)
    {

        $no = Nomination::findOrFail($id);

        if ($no->save()) {
            flash('Save successfully')->success();
            return redirect()->back();
        } else {
            flash('Something went wrong, try again later')->success();
            return redirect()->back();
        }

    }

}
