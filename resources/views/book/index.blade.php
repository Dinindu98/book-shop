@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book Shop</div>
                <div class="card-body">
                    <div>
                        @if (count($books)>0)
                            @foreach ($books as $book)
                                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                    <div class="card-header">{{$book->title}}</div>
                                    <div class="card-body">
                                    <h5 class="card-title">Price $ {{$book->price}}</h5>
                                    <p class="card-text">Book id : {{$book->id}}</p>
                                    <a href="{{route('payment',$book->id)}}"  class="btn btn-primary float-right" right>Buy Book</a>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <p>There are no book</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

