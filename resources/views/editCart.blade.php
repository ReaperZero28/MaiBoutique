@extends('homeTemplate')

@section('title')
<title>Maiboutique - Edit Cart</title>
@endsection

@section('content-1')
<div class="mainContent">
    <div class="contentTitle">
        <h2>Edit Cart</h2>
    </div>

    <div class="containter d-flex flex-wrap justify-content-around pt-3 px-3">
        <div class="card mb-3 shadow-sm" style="width: 48vw;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($cart->clothes->image) }}" class="img-fluid rounded-start" alt="..." style="object-fit: cover; max-width: 100%; max-height: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ $cart->clothes->name }}</h2>
                        <h4 class="card-text">IDR {{ $cart->clothes->price }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Stock: {{ $cart->clothes->stock }}</h6>
                        <hr>
                        <h5 class="card-text">Product Detail</h5>
                        <p class="card-text">
                            {{ $cart->clothes->desc }}
                        </p>
                        <hr>
                        <form action="/cart/edit/{{ $cart->id }}/processing" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <h6>Quantity: </h6>
                            </div>
                            <div class="mb-3 d-flex flex-wrap">
                                <input type="number" class="form-control" name="quantity" id="inputQuantity" min="1" max="{{ $cart->clothes->stock + $cart->quantity }}" value="{{ $cart->quantity }}" style="width: 10vw; margin-right: 0.5vw;">
                                <button type="submit" class="btn btn-success" style="width: 10vw; margin-left: 0.5vw;">Update Cart</button>
                            </div>
                        </form>
                        <a href="/cart" class="btn btn-danger" style="width: 21vw;">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
