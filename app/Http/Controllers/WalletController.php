<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('wallet', compact('user'));
    }

    public function addBalance(Request $request)
    {
        $user = auth()->user();

        $user->wallet_balance += 100;
        $user->save();

        return redirect()->route('wallet.index')->with('success', 'Your balance has been updated by 100.');
    }
}
