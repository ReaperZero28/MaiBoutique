@extends('homeTemplate')

@section('title')
<title>Maiboutique - Cart</title>
@endsection

@section('content-1')
<div class="mainContent">
    <div class="contentTitle">
        <h2>My Cart</h2>
    </div>

    <div class="cartDetail d-flex justify-content-end align-items-center">
        <h4>Total Price: IDR {{ $cartPrice }}</h4>
        <a href="/checkout" class="btn btn-success ms-3" style="">Check Out ({{ $cartQuantity }})</a>
    </div>

    <div class="container pt-3" style="width: 100%;">
        <div class="containter-fluid d-flex flex-wrap justify-content-left" style="width: fit-content;">
            @foreach ($cart->cart_details as $data)
            <div class="card mx-2 my-2 shadow-sm" style="width: 20vw; position: relative;">
                <img src="{{ asset($data->clothes->image) }}" class="card-img-top" alt="..." style="object-fit: cover; min-height: 60%; max-height: 60%;">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->clothes->name }}</h5>
                    <p class="card-text">IDR {{ $data->clothes->price }}</p>
                    <p class="card-text">Qty: {{ $data->quantity }}</p>
                </div>
                <div class="mb-3 d-flex flex-wrap" style="position: absolute; left: 5%; bottom: 0.5%;">
                    <a href="/cart/edit/{{ $data->id }}" class="btn btn-primary" style="margin-right: 0.5vw;">Edit Cart</a>
                    <a href="/cart/delete/{{ $data->id }}" class="btn btn-danger" style="margin-left: 0.5vw;">Remove from Cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
