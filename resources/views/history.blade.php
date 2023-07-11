@extends('homeTemplate')

@section('title')
<title>Maiboutique - History</title>
@endsection

@section('content-1')
<div class="mainContent">
    <div class="contentTitle">
        <h2>Check What You've Bought!</h2>
    </div>

    <div class="containter d-flex flex-wrap justify-content-around pt-3 px-3">
        @foreach ($history as $data)
        @php
            $totalPrice = 0;
        @endphp
        <div class="card my-2 shadow-sm" style="width: 88vw;">
            <div class="card-body">
                <h5 class="card-title">{{ $data->created_at }}</h5>
                <ul>
                    @foreach ($data->history_details as $item)
                    <li>{{ $item->quantity }} Pc(s) {{ $item->clothes->name }} &emsp; IDR {{ $item->quantity * $item->clothes->price }}</li>
                    @php
                        $totalPrice += $item->quantity * $item->clothes->price;
                    @endphp
                    @endforeach
                </ul>
                <h6 class="card-text">Total Price: IDR {{ $totalPrice }}</h6>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
