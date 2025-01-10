@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Users Who Liked You Back</h2>

    <div class="row">
        @foreach($usersLikedBack as $user)
            <x-card :$user>
            </x-card>
        @endforeach
    </div>
</div>
@endsection
