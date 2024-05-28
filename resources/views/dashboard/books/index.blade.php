@extends('dashboard.layouts.main')

@section('content')
    <h1>Books</h1>
    <a href="/dashboard/books/create" class="btn btn-primary">Tambah Perkara</a>

    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <form action="/books">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search book/author" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i
                            class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-hover .table-responsive-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Book Code</th>
                <th scope="col">Stock</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $book->title }}</td>
                    <td>
                        {{ $book->author }}
                    </td>
                    <td>
                        @foreach ($book->categories()->get() as $category)
                            {{ $category->name }}
                        @endforeach
                    </td>
                    <td>{{ $book->book_code }}</td>
                    <td>{{ $book->stock }}</td>

                    @if ($book->stock == 0)
                        <td class="text-danger">
                            {{ $book->status }}
                        </td>
                    @else
                        <td class="text-success">
                            {{ $book->status }}
                        </td>
                    @endif

                    <td>
                        <a href="/dashboard/books/{{ $book->id }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                        <a href="/dashboard/books/{{ $book->id }}/edit" class="badge bg-warning"><i
                                class="bi bi-pencil"></i></a>
                        <form action="/dashboard/books/{{ $book->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Are you sure delete {{ $book->title }}?')"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
