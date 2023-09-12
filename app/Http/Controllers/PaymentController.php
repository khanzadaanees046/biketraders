<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->has('query')){
            $q = $request->input('query');
            $installments = Payment::with('sale')->whereHas('sale', function($query) use ($q) {
                $query->where('name', 'like',  '%'. $q . '%');
            })->where('status', 0)->get();
        }else {
            $installments = Payment::with('sale')->where('status', 0)->get();
        }
        // dd($installments);
        return view('admin.installments', compact('installments'));
    }
    // --------------
    public function viewInstallemts($id)
    {
        $payments = Payment::with('sale')->find($id);
        $installments = Transaction::where('payment_id', $payments->id)->get();

        // dd($installments);
        return view('admin.installment-details', compact('payments', 'installments'));
    }
    // ----------
    public function paidInstallment($id, $payment)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 1;

        $payment  =Payment::find($payment);
        $payment->paid_amount =  $payment->paid_amount + $transaction->amount;
        $payment->save();
        $transaction->save();

        return back()->with('message', 'Your '.$id. ' Installment has been submitted.');
    }
    // -------------
    public function completeInstallemts($id)
    {
        $installments = Payment::find($id);
        $installments->status = 1;
        $installments->save();
        return back()->with('message', 'Complete All the Installments.');
    }
    // -------------
    public function deleteInstallemts($id)
    {
        $installments = Payment::find($id);
        $installments->delete();
        return back()->with('message', 'Installments Delete Successfully.');
    }
}
