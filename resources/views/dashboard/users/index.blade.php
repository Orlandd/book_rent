@extends('dashboard.layouts.main')

@section('content')

<h1>Users</h1>

<h4>User Active</h4>
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            @if ($user->status == 'active')
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->status}}</td>
                    <td>
                        <form action="/dashboard/users/{{$user->id}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Are You sure delete {{$user->username}}?')">Remove</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<h4>User inactive</h4>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        @if ($user->status == 'inactive')
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->status}}</td>
                <td>
                    <form action="/dashboard/users/{{$user->id}}" method="post">
                        @method('put')
                        @csrf
                        <button class="btn btn-success border-0" type="submit">Confirm</button>
                    </form>
                </td>
            </tr>
        @endif
        @endforeach
    </tbody>
</table>
@endsection