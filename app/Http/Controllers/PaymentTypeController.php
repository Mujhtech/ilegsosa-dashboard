<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = "Payment Types";

        if ($request->query('s')) {
            $data['keyword'] = $request->query('s');
            $data['payment_types'] = PaymentType::where('name', 'LIKE', '%' . $request->query('s') . '%')->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $data['payment_types'] = PaymentType::orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('payment.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pt = $request->payment_type_id ? PaymentType::find($request->payment_type_id) : new PaymentType;
        $pt->name = $request->name;
        $pt->status = 1;

        if ($pt->save()) {
            flash('Save successfully')->success();
            return redirect()->back();
        } else {
            flash('Something went wrong, try again later')->success();
            return redirect()->back();
        }

    }

    public function update(Request $request)
    {
        //
        $selected = explode(',', $request->selected);
        $payment_types = PaymentType::whereIn('id', $selected)->get();
        foreach ($payment_types as $payment_type) {

            if ($request->action == 'enable') {

                $payment_type->status = 1;
                $payment_type->save();

            } elseif ($request->action == 'disable') {

                $payment_type->status = 0;
                $payment_type->save();

            } elseif ($request->action == 'trash') {

                $payment_type->delete();

            }

        }

        flash('Payment type updated successfully')->success();
        return redirect()->back();
    }

}
