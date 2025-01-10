@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment for Registration</h1>
        <p>Your registration price is: {{ $registrationPrice }} units</p>

        <form method="POST" action="/payment">
            @csrf
            <div class="form-group">
                <label for="payment_amount">Enter your payment amount:</label>
                <input type="number" name="payment_amount" class="form-control" required>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
