@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book Shop</div>
                <div class="card-body">
                    <div>
                        <h2>{{$book->title}}</h2>
                        <form action="{{ route('stripe') }}" method="POST">
                            @csrf
                            {{method_field('POST')}}
                            <input type="text" name="" id="quantity">
                            <input type="text" name="quantity" id="quantity">
                            <select name="payment_method" id="payment_method">
                                <option value="bank">Bank Transfer</option>
                                <option value="card">Credit Card</option>
                            </select>
                            <button type="submit">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection