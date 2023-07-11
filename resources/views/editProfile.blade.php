@extends('homeTemplate')

@section('title')
<title>Maiboutique - Edit Profile</title>
@endsection

@section('content-1')
<div class="mainContent">
    <div class="containter d-flex flex-wrap justify-content-around pt-3 px-3">
        <div class="card shadow-sm" style="width: 36vw;">
            <div class="card-body">
                <form action="/profile/edit-profile/processing" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 text-center">
                        <h2>Update Profile</h2>
                    </div>

                    <div class="mb-3">
                        <a href="/profile" class="btn btn-outline-danger" style="width: 6vw;">Back</a>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control @error('username')
                        is-invalid
                        @enderror" name="username" id="inputUsername" value="{{ auth()->user()->username }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control @error('email')
                        is-invalid
                        @enderror" name="email" id="inputEmail" value="{{ auth()->user()->email }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone No.</label>
                        <input type="text" class="form-control @error('phone')
                        is-invalid
                        @enderror" name="phone" id="inputPhone" value="{{ auth()->user()->phone }}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control @error('address')
                        is-invalid
                        @enderror" name="address" id="inputAddress" value="{{ auth()->user()->address }}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success" style="width: 100%;">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
