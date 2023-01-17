@extends('header')

@section('content')
    <center>

        <div style="width:90%; margin-top:2%; margin-bottom:1%; border-radius:2%; background-color:white">
            <div class="card">
                <div class="card-header" style="text-align:left;">
                    Search Result
                </div>
                <div class="d-flex flex-row" style="padding-left:1%; padding-right:1%; margin-top:1%; margin-bottom:1%">

                    @foreach ($result as $item)
                        <div class="card" style="width: 20rem; height: 20rem; margin-left:1%; margin-right:1%">
                            <a href="/product/{{ $item->id }}" style="text-decoration: none; color:black">
                                <img class="card-img-top" src="{{ $item->image }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text"> {{ $item->name }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </center>
@endsection
