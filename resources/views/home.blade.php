@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('home') }}" method="GET" class="mb-4">
        <div class="input-group mb-3">
            <input 
                type="text" 
                name="search" 
                class="form-control" 
                placeholder="Search users..." 
                value="{{ request('search') }}"
            >
        </div>

        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input 
                        type="radio" 
                        class="form-check-input" 
                        name="gender" 
                        id="gender_all" 
                        value="" 
                        {{ is_null(request('gender')) || request('gender') === '' ? 'checked' : '' }}
                    >
                    <label for="gender_all" class="form-check-label">All</label>
                </div>
                <div class="form-check form-check-inline">
                    <input 
                        type="radio" 
                        class="form-check-input" 
                        name="gender" 
                        id="gender_male" 
                        value="male" 
                        {{ request('gender') === 'male' ? 'checked' : '' }}
                    >
                    <label for="gender_male" class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input 
                        type="radio" 
                        class="form-check-input" 
                        name="gender" 
                        id="gender_female" 
                        value="female" 
                        {{ request('gender') === 'female' ? 'checked' : '' }}
                    >
                    <label for="gender_female" class="form-check-label">Female</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="field_of_work" class="form-label">Field of Work:</label><br>
                @foreach (['IT', 'Finance', 'Marketing', 'Healthcare', 'Education'] as $field)
                    <div class="form-check form-check-inline">
                        <input 
                            type="checkbox" 
                            class="form-check-input" 
                            name="fields[]" 
                            id="field_{{ $field }}" 
                            value="{{ $field }}" 
                            {{ is_array(request('fields')) && in_array($field, request('fields')) ? 'checked' : '' }}
                        >
                        <label for="field_{{ $field }}" class="form-check-label">{{ $field }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Search</button>

    </form>

    <div class="row">
        @foreach ($users as $user)
            <x-card :$user/>
        @endforeach
    </div>
</div>
@endsection
