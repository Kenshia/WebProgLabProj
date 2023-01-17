@extends('header')

@section('content')
    <center>
        @if (!empty($user->getCartItems()))
            <div class="d-flex flex-column" style="width:40%; margin-top:2%">
                @foreach ($user->getCartItems() as $item)
                    <div class="card d-flex flex-row justify-content-between">
                        <div class="p-2" style="width:35%">
                            <img src="{{ $item['product']->image }}" alt="Image" style="width:90%; padding:5%">
                        </div>
                        <div class="p-2 align-self-center" style="width:65%">
                            {{ $item['product']->name }}
                            <br>
                            Price: {{ $item['product']->price }}
                            <br>
                            Qty: {{ $item['qty'] }}
                            <br>
                            Total Price: {{ $item['product']->price * $item['qty'] }}
                            <div>
                                <a href="/removeFromCart/{{ $item['product']->id }}"
                                    class="text-decoration-none text-danger">Remove</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <form action="/purchase" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                <button type="submit">Purchase</button>
            </form>
        @else
            <div class="card p-2">Empty Cart</div>
        @endif
    </center>
@endsection
