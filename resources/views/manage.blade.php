@extends('header')

@section('content')
    <center>
        <div class="d-flex justify-content-between p-3 align-self-center" style="width:50%">
            <form class="form-inline" action="/search" method="POST">
                <input class="form-control" type="search" placeholder="Product Name" name="name" id="name">
            </form>
            <a href="/addproduct">
                <button type="button" class="btn btn-secondary">Add Product + </button>
            </a>
        </div>
        <div style="width:90%; margin-top:2%; margin-bottom:1%; border-radius:2%; background-color:white">

        </div>
    </center>
@endsection
