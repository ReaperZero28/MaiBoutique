@extends('indexTemplate')

@section('title')
<title>Maiboutique - Sign In</title>
@endsection

@section('content-1')
<div class="container-fluid justify-content-around d-flex flex-wrap py-5">
    <div class="card shadow" style="width: 26vw;">
        <div class="card-body">
            <form action="/sign-in/processing" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 text-center">
                    <h2>Sign In</h2>
                </div>

                <div class="mb-3">
                    <a href="/welcome" class="btn btn-outline-danger" style="width: 6vw;">Back</a>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control @error('email')
                    is-invalid
                    @enderror" name="email" id="inputEmail" value="{{ Cookie::get('email') === null ? '' : Cookie::get('email') }}">
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
                    @enderror" name="password" id="inputPassword" value="{{ Cookie::get('password') === null ? '' : Cookie::get('password') }}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="inputRemember">
                    <label class="form-check-label">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Sign in</button>

                <div class="mb-3">
                    <p class="pt-3">
                        Not registered yet? <a href="/sign-up">Sign up here</a>.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
