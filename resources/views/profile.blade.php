@extends('layouts.main')

@section('container')

<div class="container">
    <h1>
        My Profile
    </h1>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="mt-3 mb-5">
        @foreach ($users as $user)
        <form>
            <div class="d-flex justify-content-center">
                <figure class="figure">
                    <img src="https://source.unsplash.com/500x500?girl-profile" class="figure-img img-fluid rounded" alt="...">
                </figure>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" value="{{$user->name}}" disabled>
                </div>
            </div>
    
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" value="{{$user->username}}" disabled>
                </div>
            </div>
    
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" value="{{$user->email}}" disabled>
                </div>
            </div>
    
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" value="{{$user->phone}}" disabled>
                </div>
            </div>
    
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" value="{{$user->address}}" disabled>
                </div>
            </div>
        </form>
        @endforeach

        <div class="d-flex justify-content-end mt-5">
            <a href="" class="btn btn-primary mx-3">Change Password</a>
            <a href="/profile/{{$user->id}}/edit" class="btn btn-primary mx-3">Edit Profile</a>
        </div>
    </div>



</div>

@endsection