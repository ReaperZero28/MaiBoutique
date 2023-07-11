@extends('homeTemplate')

@section('title')
<title>Maiboutique - Profile</title>
@endsection

@section('content-1')
<div class="mainContent">
    <div class="containter d-flex flex-wrap justify-content-around pt-3 px-3">
        <div class="card text-center p-2 shadow-sm" style="width: 48vw;">
            <div class="card-body">
                <h2 class="card-title">My Profile</h2>
                <h6 class="card-subtitle mb-2 text-muted">{{ $profile->role }}</h6>

                <br>

                <h5 class="card-text">Username: {{ $profile->username }}</h5>
                <p class="card-subtitle mb-2">{{ $profile->email }}</p>

                <p class="card-text">
                    Address: {{ $profile->address }}<br>
                    Phone: {{ $profile->phone }}
                </p>

                <br>

                <div class="mb-3 d-flex flex-wrap justify-content-center">
                    {{-- For MEMBER start --}}
                    @if (Auth::user()->role == 'member')
                    <a href="/profile/edit-profile" class="btn btn-primary" style="width: 10vw; margin-right: 0.5vw;">Edit Profile</a>
                    @endif
                    {{-- For MEMBER end --}}
                    <a href="/profile/edit-password" class="btn btn-outline-primary" style="width: 10vw; margin-left: 0.5vw;">Edit Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
