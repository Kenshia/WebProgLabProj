@extends('header')

@section('content')
    <center>

        <div style="width:90%; margin-top:2%; margin-bottom:1%; border-radius:2%; background-color:white">
            <div class="card">
                <div class="card-header" style="text-align:left;">
                    Search Result for: {{ $keyword }}
                </div>
                <div class="d-flex flex-wrap" style="padding-left:1%; padding-right:1%; margin-top:1%; margin-bottom:1%">
                    {{-- <div class="row" style="justify-content:space-evenly"> --}}
                    @foreach ($result as $item)
                        <div class="card" style="width: 20rem; height: 20rem; margin:auto; margin-bottom:4%">
                            <a href="/product/{{ $item->id }}" style="text-decoration: none; color:black">
                                <img class="card-img-top" src="{{ $item->image }}" alt="Card image cap">
                                <p class="card-text"> {{ $item->name }}</p>
                            </a>
                        </div>
                    @endforeach
                    {{-- </div> --}}
                </div>
            </div>

        </div>
    </center>
@endsection
