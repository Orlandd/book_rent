@extends('dashboard.layouts.main')

@section('content')
    <h1>Category</h1>
    <a href="/dashboard/categories/create" class="btn btn-primary">Tambah Category</a>

    <table class="table table-hover .table-responsive-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/dashboard/categories/{{ $category->id }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                        <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"><i
                                class="bi bi-pencil"></i></a>
                        <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Are you sure delete {{ $category->name }}?')"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
