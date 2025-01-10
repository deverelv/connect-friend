<div class="col-md-4">
    <div class="card mb-4">
        <div class="card-header">

            <div class="container mb-3 text-center">
                <img src="{{ asset($user->profile_picture) }}" alt="profile-picture" class="img-fluid">
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ auth()->check() ? route('user.show', $user->id) : route('login') }}">
                    <h5>
                        {{ $user->name }}
                    </h5>
                </a>
            

                @if (auth()->check())
                    <form action="{{ route('like.user', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit-" class="btn btn-primary">
                            @if(auth()->user()->wishlists()->where('liked_id', $user->id)->where('state', true)->exists())
                                Unlike
                            @else
                                Like
                            @endif
                        </button>
                    </form>
                @endif
            </div>
            
        </div>
        <div class="card-body">
            <p>Email: {{ $user->email }}</p>
            <p>Field of work: {{ $user->field_of_work }}</p>
            <p>Years of Experience: {{ $user->years_of_experience }}</p>
        </div>

        {{ $slot }}
    </div>
</div>