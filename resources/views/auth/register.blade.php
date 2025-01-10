@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">
                                        {{ __('Male') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">
                                        {{ __('Female') }}
                                    </label>
                                </div>

                                @error('gender')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="field_of_work" class="col-md-4 col-form-label text-md-end">{{ __('Field of Work') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input @error('field_of_work') is-invalid @enderror" type="checkbox" name="field_of_work[]" id="it" value="IT" {{ in_array('IT', old('field_of_work', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="it">
                                        {{ __('IT') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('field_of_work') is-invalid @enderror" type="checkbox" name="field_of_work[]" id="finance" value="Finance" {{ in_array('Finance', old('field_of_work', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="finance">
                                        {{ __('Finance') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('field_of_work') is-invalid @enderror" type="checkbox" name="field_of_work[]" id="marketing" value="Marketing" {{ in_array('Marketing', old('field_of_work', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="marketing">
                                        {{ __('Marketing') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('field_of_work') is-invalid @enderror" type="checkbox" name="field_of_work[]" id="healthcare" value="Healthcare" {{ in_array('Healthcare', old('field_of_work', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="healthcare">
                                        {{ __('Healthcare') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('field_of_work') is-invalid @enderror" type="checkbox" name="field_of_work[]" id="education" value="Education" {{ in_array('Education', old('field_of_work', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="education">
                                        {{ __('Education') }}
                                    </label>
                                </div>

                                @error('field_of_work')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="linkedin_username" class="col-md-4 col-form-label text-md-end">{{ __('Linkedin Username') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text" id="linkedin-prefix">https://www.linkedin.com/in/</span>
                                    <input id="linkedin_username" type="text" class="form-control @error('linkedin_username') is-invalid @enderror" name="linkedin_username" value="{{ old('linkedin_username') }}" required autocomplete="linkedin_username" autofocus>
                                </div>

                                @error('linkedin_username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobile_number" autofocus>

                                @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="years_of_experience" class="col-md-4 col-form-label text-md-end">{{ __('Years of Experience') }}</label>

                            <div class="col-md-6">
                                <input id="years_of_experience" type="text" class="form-control @error('years_of_experience') is-invalid @enderror" name="years_of_experience" value="{{ old('years_of_experience') }}" required autocomplete="years_of_experience" autofocus>

                                @error('years_of_experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
