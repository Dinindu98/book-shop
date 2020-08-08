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
                                <h3>{{$book->title}}</h3>
                                <h4>$ {{$book->price}}</h4>
                                <a href="{{route('payment',$book->id)}}"><h4>Buy Book</h4></a>
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

