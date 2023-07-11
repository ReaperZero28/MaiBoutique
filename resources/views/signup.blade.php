@extends('indexTemplate')

@section('title')
<title>Maiboutique - Sign Up</title>
@endsection

@section('content-1')
<div class="container-fluid justify-content-around d-flex flex-wrap py-4">
    <div class="card" style="width: 26vw;">
        <div class="card-body">
            <form action="/sign-up/processing" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 text-center">
                    <h2>Sign Up</h2>
                </div>

                <div class="mb-3">
                    <a href="/welcome" class="btn btn-outline-danger" style="width: 6vw;">Back</a>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control @error('username')
                    is-invalid
                    @enderror" name="username" id="inputUsername" placeholder="5-20 characters">
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
                    @enderror" name="email" id="inputEmail">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control @error('password')
                    is-invalid
                    @enderror" name="password" id="inputPassword" placeholder="5-20 characters">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone No.</label>
                    <input type="text" class="form-control @error('phone')
                    is-invalid
                    @enderror" name="phone" id="inputPhone" placeholder="10-13 numbers">
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
                    @enderror" name="address" id="inputAddress" placeholder="min. 5 characters">
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%">Sign up</button>

                <div class="mb-3">
                    <p class="pt-3">
                        Already registered? <a href="/sign-in">Sign in here</a>.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
