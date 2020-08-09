@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book Shop</div>
                <div class="card-body">
                    <h2>Bank Transfer</h2>
                    
                    <h4> <a href="{{route('stripe.bank',$book->id)}}" class="btn btn-info">Bank Transfer</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection