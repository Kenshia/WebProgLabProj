@extends('header')

@section('content')
    <center>

        <div style="width:90%; margin-top:2%; margin-bottom:1%; border-radius:2%; background-color:white">

            @foreach ($categories as $category)
                <div class="card">
                    <div class="card-header" style="text-align:left;">
                        {{ $category->name }}
                        <a href="/category/{{ $category->name }}">
                            View All
                        </a>
                    </div>
                    <div class="d-flex flex-row" style="padding-left:1%; padding-right:1%; margin-top:1%; margin-bottom:1%">

                        @foreach ($category->products->take(10) as $item)
                            <div class="card" style="width: 20rem; height: 20rem; margin-left:1%; margin-right:1%">
                                <img class="card-img-top" src="{{ $item->image }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk
                                        of
                                        the
                                        card's content.</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endforeach

        </div>
    </center>
@endsection
