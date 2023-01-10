@extends('header')

@section('content')
    <center>
        <form action="/login" method="post">
            {{ csrf_field() }}
            <div class="d-flex flex-column"
                style="width:25%; margin-top:2%; margin-bottom:2%; padding-top:1%; padding-bottom:1%; border-radius:2%; background-color:white">
                <h1>Login</h1>
                <label style="text-align:left; margin-left:2%;">Email</label>
                <input type="text" name="email" style="margin:2%">
                <label style="text-align:left; margin-left:2%;">Password</label>
                <input type="text" name="password" style="margin:2%">
                <div class="d-flex" style="margin-left: 2%">
                    <input type="checkbox" name="rememberme" id="rememberme">
                    <label style="margin-left: 1%; padding-bottom:3px"> Remember Me</label>
                </div>
                <center>
                    <button type="submit" style="width: 50%; margin-top: 5%">Login</button>
                </center>
            </div>
        </form>
    </center>
@endsection