@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($users as $user)
                    {{$user->name}} - {{$user->email}} - {{implode(',',$user->roles()->get()->pluck('name')->toArray())}} - 
                    <a href="{{route('admin.users.edit',$user->id)}}">edit</a>-
                    <form action="{{route('admin.users.destroy',$user)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-warning">Delete </button>
                    </form>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection