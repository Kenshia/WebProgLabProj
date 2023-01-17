@extends('header')

@section('content')
    <center>

        <div style="width:90%; margin-top:2%; margin-bottom:1%; border-radius:2%; background-color:white">
            <div class="card">
                <div class="card d-flex flex-row" style="padding-left:1%; padding-right:1%; margin-top:1%; margin-bottom:1%">

                    <div class="card" style="width: 20rem; height: 20rem; margin-left:1%; margin-right:1%">
                        <img class="card-img-top" src="../{{ $product->image }}" alt="Card image cap">
                        <p class="">{{ $product->name }}</p>
                        <p class="">{{ $product->detail }}</p>
                    </div>

                </div>
            </div>
        </div>
    </center>
@endsection
