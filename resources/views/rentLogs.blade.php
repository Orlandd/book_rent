@extends('layouts.main')

@section('container')
    <a href="/" class="text-decoration-none text-black fs-2"><i class="bi bi-arrow-left-circle-fill"></i> Back</a>
    <h1>My Rent Logs</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book</th>
                <th scope="col">Author</th>
                <th scope="col">Rent Date</th>
                <th scope="col">Return Date</th>
                <th scope="col">Actual Return Date</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        @foreach ($log->books()->get() as $book)
                            {{$book->title}}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($log->books()->get() as $book)
                            {{$book->author}}
                        @endforeach
                    </td>
                    <td>{{$log->rent_date}}</td>
                    <td>{{$log->return_date}}</td>
                    <td>{{$log->actual_return_date}}</td>
                    <td>
                        @if ($log->actual_return_date)
                            <span class="badge text-bg-success">Returned</span>
                        @else
                            <span class="badge text-bg-danger">Not Return</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        
        </tbody>
    </table>

@endsection