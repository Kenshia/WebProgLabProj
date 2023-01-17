@extends('header')

@section('content')
    <center>
        @foreach ($purchaseHistory->get() as $transaction)
            <div class="d-flex justify-content-between p-3 align-self-center" style="width: 50%">
                <table class="table table-hover table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="text-primary">Transaction Date {{ $transaction->created_at }}</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Sub Price</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        @foreach ($transaction->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->qty * $item->product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-light">
                        <tr>
                            <th scope="col">Total</th>
                            <th scope="col">{{ $transaction->getTotalQty() }}</th>
                            <th scope="col">{{ $transaction->getTotalPrice() }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @endforeach
    </center>
@endsection
