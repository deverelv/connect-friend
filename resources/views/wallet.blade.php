@extends('layouts.app')

@section('content')
    <div class="container mt-1">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h3>My Wallet</h3>
        <p>Your current balance: <strong>{{ $user->wallet_balance }}</strong></p>

        <form action="{{ route('wallet.add-balance') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Add 100 to Wallet</button>
        </form>
    </div>
@endsection