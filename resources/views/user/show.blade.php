@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{ $user->name }}'s Profile</h3>
        </div>
        <div class="card-body">
            <p>Email: {{ $user->email }}</p>
            <p>Gender: {{ $user->gender }}</p>
            <p>Field of Work: {{ $user->field_of_work }}</p>
            <p>Years of Experience: {{ $user->years_of_experience }}</p>
            <p>LinkedIn: {{ $user->linkedin_username }}</p>
            <p>Mobile Number: {{ $user->mobile_number }}</p>
        </div>
    </div>
</div>
@endsection