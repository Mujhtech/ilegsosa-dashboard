<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Paystack;

class PaymentController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = "Pay Due";
        $types = PaymentType::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('due.index', compact('title', 'types'));
    }

    public function transaction(Request $request)
    {

        $title = "Transactions";
        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $transactions = Payment::orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $transactions = Payment::where('user_id', $request->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('transaction.index', compact('title', 'transactions'));

    }

    public function pay(Request $request)
    {
        $payment = new Payment;
        $payment->payment_type_id = $request->type;
        $payment->payment_id = $request->type;
        $payment->reference = $request->reference;
        $payment->amount = $request->bill;
        $payment->status = 1;
        $payment->payment_status = 0;
        $payment->user_id = $request->user()->id;
        $payment->save();

        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception$e) {
            flash('The paystack token has expired. Please refresh the page and try again.')->error();
            return redirect()->back()->with(['error' => 'The paystack token has expired. Please refresh the page and try again.']);
        }

    }

    public function handleCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $payment = Payment::where('reference', $paymentDetails['data']['reference'])->first();

        if (Payment::where('reference', $paymentDetails['data']['reference'])->exists()) {

            if ($paymentDetails['data']['status'] == 'success') {

                $payment->payment_status = 1;
                $payment->save();

                flash('Payment confirmed successfully')->success();
                return redirect()->route('user.due');

            } else {

                $payment->payment_status = 2;
                $payment->save();

                flash('Payment failed')->error();
                return redirect()->route('user.due');

            }

        } else {

            flash('Payment not found')->error();
            return redirect()->route('user.due');

        }

        //dd($paymentDetails);
    }
}
