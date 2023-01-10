@extends('header')

@section('content')
    <h1>HOME</h1>
    {{-- if not logged in --}}
    <a href="/login">Login</a>
    {{-- else show profile / log out button --}}
@endsection
