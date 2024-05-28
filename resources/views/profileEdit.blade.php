@extends('layouts.main')

@section('container')

<div class="container">
    <h1>
        Edit My Profile
    </h1>

    <form action="/profile/{{auth()->user()->id}}" method="post">
        @method('put')
        @csrf
        @foreach ($users as $user)
            <input type="text" name="id" value="{{$user->id}}" hidden>
            <div class="form-floating mb-3">
                <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name@example.com" value="{{old('name', $user->name)}}">
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="name@example.com" value="{{$user->username}}">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{$user->email}}">
                <label for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="name@example.com" value="{{$user->phone}}">
                <label for="phone">Phone</label>
                @error('phone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="address" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="name@example.com" value="{{$user->address}}">
                <label for="address">Address</label>
                @error('address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Update</button>
            </div>
        @endforeach
    </form>


</div>

@endsection