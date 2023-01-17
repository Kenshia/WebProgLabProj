@extends('header')

@section('content')
    <center>
        <div class="d-flex justify-content-between p-3 align-self-center" style="width:50%">
            <form class="form-inline" action="/manage/search" method="get">
                <input class="form-control" type="search" placeholder="Product Name" name="name" id="name">
            </form>
            <a href="/manage/add">
                <button type="button" class="btn btn-secondary">Add Product + </button>
            </a>
        </div>
        <div class="d-flex flex-wrap" style="width:90%; background-color:white">
            @foreach ($products as $product)
                <div class="card" style="width:20rem; margin:auto; ">
                    <img src="../{{ $product->image }}" alt="{{ $product->name }} image">
                    <div class="p-2">
                        {{ $product->name }}
                        <div class="d-flex justify-content-around" style="width:50%">
                            <a href="/manage/update/{{ $product->id }}"><button type="button"
                                    class="btn btn-info btn-sm">Edit</button></a>

                            <a href="/manage/delete/{{ $product->id }}"><button type="submit"
                                    class="btn btn-danger btn-sm">Delete</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </center>
@endsection
