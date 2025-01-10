@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Settings</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="container mb-2">
        <img src="{{ asset($user->profile_picture) }}" alt="profile-picture" class="img-fluid">
    </div>

    <form action="{{ route('settings.unhide-profile') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">
            Unhide My Profile
        </button>
    </form>

    <form action="{{ route('settings.hide-profile') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger" 
            {{ auth()->user()->wallet_balance < 50 ? 'disabled' : '' }}>
            Hide My Profile (50 Coins)
        </button>
    </form>
</div>
@endsection
