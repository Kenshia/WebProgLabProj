@extends('header')

@section('content')
    <center>
        {{ csrf_field() }}
        <div class="d-flex flex-column"
            style="width:25%; margin-top:2%; margin-bottom:2%; padding-bottom:1%; padding-left:1%; padding-right:1%; border-radius:2%; background-color:white">
            <div class="text-center " style="padding-top: 2%; padding-bottom:2%">
                <p>Profile</p>
            </div>
            <div class="form-outline mb-4 text-left">
                <input type="text" class="form-control" disabled="disabled" value="{{ Auth::user()->name }}" />
            </div>
            <div class="form-outline mb-4">
                <input type="text" class="form-control" disabled="disabled" value="{{ Auth::user()->email }}" />
            </div>
            <div class="form-outline mb-4">
                <input type="text" class="form-control" disabled="disabled" value="{{ Auth::user()->gender }}" />
            </div>
            <div class="form-outline mb-4">
                <input type="text" class="form-control" disabled="disabled" value="{{ Auth::user()->dob }}" />
            </div>
            <div class="form-outline mb-4">
                <input type="text" class="form-control" disabled="disabled" value="{{ Auth::user()->country }}" />
            </div>
        </div>
    </center>
@endsection
