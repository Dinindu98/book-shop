@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book Shop</div>
                <div class="card-body">
                    <h2>Product : {{$book->title}}</h2>
                    <p>{{$book->description}}</p>
                    <h3>Price : $ {{$book->price}}</h3>
                    <hr>
                    <h5>Select your payment method</h5>
                    <h4><a href="{{route('stripe.card',$book->id)}}">Card Payment</a></h4>
                    <h4> <a href="{{route('stripe.bank',$book->id)}}">Bank Payment</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection