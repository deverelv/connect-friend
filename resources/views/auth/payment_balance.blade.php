@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment Details</h1>

        <div class="alert alert-info">
            <p>Sorry, you overpaid by {{ $overpaid }} units.</p>
            <p>Would you like to store this balance in your wallet?</p>

            <form method="POST" action="{{ route('store_balance') }}">
                @csrf
                <input type="hidden" name="overpaid_amount" value="{{ $overpaid }}">
                <button type="submit" class="btn btn-success">Yes, store in wallet</button>
            </form>

            <form method="POST" action="{{ route('reenter_payment') }}">
                @csrf
                <button type="submit" class="btn btn-danger">No, let me try again</button>
            </form>
        </div>
    </div>
@endsection
