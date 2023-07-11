@extends('homeTemplate')

@section('title')
<title>Maiboutique - Home</title>
@endsection

@section('content-1')
<div class="mainContent">
    <div class="contentTitle">
        <h2>Find Your Best Clothes Here!</h2>
    </div>

    <div class="container pt-3" style="width: 100%;">
        <div class="containter-fluid d-flex flex-wrap justify-content-left" style="width: fit-content;">
            @foreach ($clothes as $data)
            <div class="card mx-2 my-2 shadow-sm" style="width: 20vw; position: relative;">
                @if ($data->stock == 0)
                <img src="{{ asset($data->image) }}" class="card-img-top" alt="..." style="object-fit: cover; min-height: 60%; max-height: 60%; filter: grayscale(100%) brightness(72%);">
                @else
                <img src="{{ asset($data->image) }}" class="card-img-top" alt="..." style="object-fit: cover; min-height: 60%; max-height: 60%;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $data->name }}</h5>
                    <p class="card-text">IDR {{ $data->price }}</p>
                    @if ($data->stock == 0)
                    <h6 class="text-danger">Out of stock</h6>
                    @endif
                </div>
                <a href="/product/{{ $data->id }}" class="btn btn-primary" style="position: absolute; left: 5%; bottom: 3%;">More Detail</a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container d-flex justify-content-center mt-3" style="width: 100vw;">
        {{ $clothes->links() }}
    </div>
</div>
@endsection
