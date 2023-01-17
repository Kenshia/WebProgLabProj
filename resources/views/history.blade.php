@extends('header')

@section('content')
    <center>
        <div class="d-flex justify-content-between p-3 align-self-center" style="width: 50%">
            <table class="table table-hover table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th scope="col" class="text-primary">Transaction Date 2022-07-05 04:42:02</th>
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
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
                <tfoot class="bg-light">
                    <tr>
                        <th scope="col">Total</th>
                        <th scope="col">qty</th>
                        <th scope="col">sprice</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </center>
@endsection
