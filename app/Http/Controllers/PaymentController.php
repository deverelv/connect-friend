<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $user = auth()->user();
        $registrationPrice = $user->registration_price;

        return view('auth.payment', compact('registrationPrice'));
    }

    public function processPayment(Request $request)
    {
        $user = auth()->user();
        $registrationPrice = $user->registration_price;
        $paymentAmount = $request->input('payment_amount');
        $balance = $paymentAmount - $registrationPrice;

        if ($paymentAmount < $registrationPrice) {
            return redirect('/payment')->with('error', "You are still underpaid by " . ($registrationPrice - $paymentAmount) . " units.");
        } elseif ($paymentAmount > $registrationPrice) {
            return view('auth.payment_balance', [
                'overpaid' => $balance,
                'paymentAmount' => $paymentAmount,
                'user' => $user,
            ]);
        }

        return redirect('/success');
    }

    public function storeBalance(Request $request)
    {
        $user = auth()->user();
        $overpaidAmount = $request->input('overpaid_amount');

        $user->wallet_balance += $overpaidAmount;
        $user->save();

        return redirect('/home');
    }

    public function reenterPayment(Request $request)
    {
        return redirect('/payment')->with('error', 'Please re-enter the correct payment amount.');
    }
}

