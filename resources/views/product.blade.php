@extends('homeTemplate')

@section('title')
<title>Maiboutique - Product</title>
@endsection

@section('content-1')
<div class="mainContent">
    <div class="containter d-flex flex-wrap justify-content-around pt-5">
        <div class="card mb-3 shadow-sm" style="width: 48vw;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($clothes->image) }}" class="img-fluid rounded-start" alt="..." style="object-fit: cover; max-width: 100%; max-height: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ $clothes->name }}</h2>
                        <h4 class="card-text">IDR {{ $clothes->price }}</h4>
                        @if ($clothes->stock == 0)
                        <h6 class="card-subtitle mb-2 text-muted d-inline">Stock: <h6 class="text-danger fw-bold d-inline">Out of stock</h6></h6>
                        @elseif ($clothes->stock == 1)
                        <h6 class="card-subtitle mb-2 text-muted d-inline">Stock: <p class="text-danger fw-bold d-inline">{{ $clothes->stock }}</p></h6>
                        @else
                        <h6 class="card-subtitle mb-2 text-muted">Stock: {{ $clothes->stock }}</h6>
                        @endif
                        <hr>
                        <h5 class="card-text">Product Detail</h5>
                        <p class="card-text">
                            {{ $clothes->desc }}
                        </p>
                        <hr>
                        @auth
                        {{-- For MEMBER start --}}
                        @if (Auth::user()->role == 'member')
                        <form action="/product/{{ $clothes->id }}/add-to-cart" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <h6>Quantity: </h6>
                            </div>
                            <div class="mb-3 d-flex flex-wrap">
                                @if ($clothes->stock == 0)
                                <input type="number" class="form-control" name="quantity" id="inputQuantity" style="width: 10vw; margin-right: 0.5vw;" disabled>
                                <button type="submit" class="btn btn-success disabled" style="width: 10vw; margin-left: 0.5vw;">Add to Cart</button>
                                @else
                                <input type="number" class="form-control" name="quantity" id="inputQuantity" min="1" max="{{ $clothes->stock }}" value="1" style="width: 10vw; margin-right: 0.5vw;">
                                <button type="submit" class="btn btn-success" style="width: 10vw; margin-left: 0.5vw;">Add to Cart</button>
                                @endif
                            </div>
                        </form>
                        {{-- For MEMBER end --}}
                        {{-- For ADMIN start --}}
                        @elseif (Auth::user()->role == 'admin')
                        <form action="/product/{{ $clothes->id }}/restock" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <h6>Quantity: </h6>
                            </div>
                            <div class="mb-3 d-flex flex-wrap">
                                <input type="number" class="form-control" name="quantity" id="inputQuantity" min="1" value="1" style="width: 10vw; margin-right: 0.5vw;">
                                <button type="submit" class="btn btn-success" style="width: 10vw; margin-left: 0.5vw;">Restock</button>
                            </div>
                        </form>
                        @endif
                        {{-- For ADMIN end --}}
                        @endauth
                        <div class="mb-3 d-flex flex-wrap">
                            <a href="/home" class="btn btn-danger" style="width: 10vw; margin-right: 0.5vw;">Back</a>
                            {{-- For ADMIN start --}}
                            @auth
                            @if (Auth::user()->role == 'admin')
                                <a href="/product/{{ $clothes->id }}/delete" class="btn btn-danger" style="width: 10vw; margin-left: 0.5vw;">Delete</a>
                            @endif
                            @endauth
                            {{-- For ADMIN end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
