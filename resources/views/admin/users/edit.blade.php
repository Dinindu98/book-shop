@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Edit User{{$user->name}}</div>

                <div class="card-body">
                <form action="{{route('admin.users.update',$user)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required  autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required  autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="roles" class="col-md-4 col-form-label text-md-right">Roles</label>
                        <div class="col-md-6">
                    @foreach ($roles as $role)
                        <div class="form-check">
                        <input type="radio" name="roles[]" value="{{$role->id}}"
                        @if($user->roles->pluck('id')->contains($role->id)) checked @endif >
                        <label> {{$role->name}} </label>
                        </div>
                    @endforeach
                    </div>                  
                    </div>

                    @if(!is_null($user->userprofile))
                    <div class="form-group row">
                        <label for="roles" class="col-md-4 col-form-label text-md-right">User Profile Link</label>
                        <div class="col-md-6">
                            <div><a href="{{route('userprofile.index') . '/'. $user->userprofile->user_id}}">Profile link</a></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="roles" class="col-md-4 col-form-label text-md-right">User NIC</label>
                        <div class="col-md-6">
                            <div>{{$user->userprofile->first()->nic}}</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="roles" class="col-md-4 col-form-label text-md-right">User NIC</label>
                        <div class="col-md-6">
                           <img src="{{route('admin.get_nic', ['id' => $user->id])}}" width="75%"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="roles" class="col-md-4 col-form-label text-md-right">User state</label>
                        <div class="col-md-6">
                        <INPUT TYPE="Radio" Name="state" Value="new" checked>New
                        <INPUT TYPE="Radio" Name="state" Value="verify"  @if($user->isVerified()) checked @endif required>Verified
                        <INPUT TYPE="Radio" Name="state" Value="pro"  @if($user->userprofile()->first()->state === "pro") checked @endif required>Pro         
                        </div>
                    </div>

                    @endif
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection