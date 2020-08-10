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

                    <a href="{{ route('admin.dashboard') }}" class="btn btn-info">Dashboard</a> 
                    <hr>
                    <h4>User List</h4>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Total Payment</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{$payment->name}}</td>
                                    <td>$ {{$payment->total_payment}}</td>
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