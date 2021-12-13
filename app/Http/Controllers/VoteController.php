<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Nomination;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = "Cast Vote";
        $designations = Designation::with('nominations')->get();
        return view('vote.index', compact('title', 'designations'));
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

}
