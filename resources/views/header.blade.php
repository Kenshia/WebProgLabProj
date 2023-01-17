<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <title>Barbatos Shop</title>
</head>

<header>
    <div style="background-color:white; padding-top: 10px; padding-bottom: 10px">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <div class="p-3 align-self-center">
                    <a href="/" style="text-decoration:none; color:black">
                        <h2>Barbatos Shop</h2>
                    </a>
                </div>
                <div class="d-flex justify-content-between p-3 align-self-center" style="width:max">
                    <form class="form-inline" action="/search" method="get">
                        <input class="form-control" type="search" placeholder="Search" name="name" id="name">
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="p-3 align-self-center">
                    @if (Auth::check())
                        {{ Auth::user()->name }} | <a href="/logout" style="text-decoration: none">Logout</a>
                    @else
                        <a href="/login" style="text-decoration:none">Login</a>
                    @endif
                </div>
                <div class="p-3 align-self-center">
                    @if (Auth::check())
                        @if (Auth::user()->privilege == 'Admin')
                            <a href="/manage" style="text-decoration: none; color:black">
                                <button type="button" class="btn btn-secondary">Manage Product</button></a>
                        @else
                            <a href="/cart">Cart</a>
                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<body style="background-color:  #d3d3d3;">
    @yield('content')
</body>

<footer>
    <div style="height:100%; background-color:white; padding-top: 10px; padding-bottom: 10px">
        <center>
            © 2023 Copyright: Barbatos Shop
        </center>
    </div>
</footer>

</html>
