@extends('indexTemplate')

@section('title')
<title>Maiboutique - Welcome</title>
@endsection

@section('content-1')
<div class="container-fluid">
    <div class="text_content text-center" style="padding-top: 30vh; padding-bottom: 3vh;">
        <h2 class="text-light" style="text-shadow: 1px 2px 12px rgba(0,0,0,0.6);">Welcome to MaiBoutique</h2>
        <h6 class="text-break text-light" style="text-shadow: 1px 2px 12px rgba(0,0,0,0.6);">Online Boutique That Provides You with Various Clothes to Suit Your Various Activities</h5>
    </div>
    <div class="button_content d-flex flex-wrap justify-content-center" style="padding-top: 1vh;">
        <a class="btn btn-primary m-2 shadow-sm" href="/sign-in" style="width: 6vw;">Sign In</a>
        <a class="btn btn-primary m-2 shadow-sm" href="/sign-up" style="width: 6vw;">Sign Up</a>
    </div>
    <div class="text_content_2 text-center">
        <p class="text-light" style="padding-top: 1vh; text-shadow: 2px 3px 10px rgba(0,0,0,0.6);">
            Continue as guest <a href="/home">here</a>.
        </p>
    </div>
</div>
@endsection
