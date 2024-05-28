@extends('dashboard.layouts.main')

@section('content')

<h1>Rent Logs</h1>

<div class="row justify-content-center my-3">
    <div class="col-md-6">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search name" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="button" id="button-addon2">Search</button>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Books</th>
            <th scope="col">Rent Date</th>
            <th scope="col">Return Date</th>
            <th scope="col">Actual Return Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    @foreach ($log->users()->get() as $user)
                        {{$user->name}}
                        
                    @endforeach
                </td>

                <td>
                    @foreach ($log->users()->get() as $user)
                        {{$user->username}}
                        
                    @endforeach
                </td>
                <td>
                    @foreach ($log->books()->get() as $book)
                        {{$book->title}}
                        
                    @endforeach
                </td>
                <td>{{$log->rent_date}}</td>
                <td>{{$log->return_date}}</td>
                <td>{{$log->actual_return_date}}</td>
                <td>
                    @if ($log->actual_return_date)
                        <p class="text-success p-0">Returned</p>
                    @else
                        <p class="text-danger p-0">Not Return</p>
                    @endif
                </td>
                <td>
                    <form action="/dashboard/rentLogs/{{$log->id}}" method="post">
                        @method('put')
                        @csrf

                        @if ($log->actual_return_date)
                            <button class="btn btn-success" disabled>Returned</button>
                        @else
                            @foreach ($log->books()->get() as $book)
                                
                                <input type="text" name="book_id" id="book_id" value="{{$book->id}}" hidden>
                                <button class="btn btn-primary">Return</button>
                                
                            @endforeach
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection