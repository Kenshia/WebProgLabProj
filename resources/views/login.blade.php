@extends('header')

@section('content')
    <center>
        <form action="/login" method="post">
            {{ csrf_field() }}
            <div class="d-flex flex-column"
                style="width:25%; margin-top:2%; margin-bottom:2%; padding-bottom:1%; padding-left:1%; padding-right:1%; border-radius:2%; background-color:white">
                <div class="text-center" style="padding-top: 2%; padding-bottom:2%">
                    <h1>Login</h1>
                </div>
                <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control" placeholder="Email address" />
                </div>
                <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="rememberme" checked />
                            Remember me
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                <div class="text-center">
                    <p>Not a member? <a href="/register" style="text-decoration: none">Register</a></p>
                </div>

                @if (!empty($auth_failed))
                    <div style="color:red">
                        Incorrect email or password
                    </div>
                @endif
            </div>
        </form>
    </center>
@endsection
