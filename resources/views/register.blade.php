@extends('header')

@section('content')
    <center>
        <form action="/register" method="post">
            {{ csrf_field() }}
            <div class="d-flex flex-column"
                style="width:25%; margin-top:2%; margin-bottom:2%; padding-bottom:1%; padding-left:1%; padding-right:1%; border-radius:2%; background-color:white">
                <div class="text-center" style="padding-top: 2%; padding-bottom:2%">
                    <p>Register</p>
                </div>
                <div class="form-outline mb-4 text-left">
                    <input type="text" name="name" class="form-control" placeholder="Name" />
                </div>
                <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control" placeholder="Email address" />
                </div>
                <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                <div class="form-outline mb-4">
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" />
                </div>
                <div class="form-outline mb-4">
                    <select class="form-select form-control" name="gender">
                        <option selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" name="dob" onfocus="(this.type='date')" class="form-control" min="1900-01-01"
                        max={{ date('Y-m-d', time() - 86400) }} placeholder="Date of Birth">
                </div>
                <div class="form-outline mb-4">
                    <select id="country" class="form-select form-control" name="country">
                        <option selected>Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

                <div class="text-center">
                    <p>Have an account? <a href="/login" style="text-decoration: none">Login</a></p>
                </div>

                @if (!empty($errors))
                    @foreach ($errors->all() as $error)
                        <div style="color:red">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>
        </form>
    </center>
@endsection
