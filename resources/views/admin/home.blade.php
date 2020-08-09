@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{$payment->name}}</td>
                                    <td>{{$payment->title}}</td>
                                    <td>$ {{$payment->price}}</td>
                                    <td>{{$payment->quantity}}</td>
                                    <td>$ {{$payment->price * $payment->quantity}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection