@extends('header')

@section('content')
    <center>

        <div style="width:90%; margin-top:2%; margin-bottom:1%; border-radius:2%; background-color:white">
            <div class="card">
                <div class="card-header" style="text-align:left;">
                    {{ $name }}
                </div>
                <div class="d-flex flex-row" style="padding-left:1%; padding-right:1%; margin-top:1%; margin-bottom:1%">

                    @foreach ($items as $item)
                        <div class="card" style="width: 20rem; height: 20rem; margin-left:1%; margin-right:1%">
                            <img class="card-img-top" src="../{{ $item->image }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{ $item->detail }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="d-flex justify-content-end" style="padding-top:1%; background-color:  #d3d3d3;">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="{{ $items->previousPageUrl() }}">&lt;</a></li>
                        @for ($i = 1; $i <= $items->lastPage(); $i++)
                            <li class="page-item"><a class="page-link"
                                    href="?page={{ $i }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{ $items->nextPageUrl() }}">&gt;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </center>
@endsection
