@extends('dashboard.layouts.main')

@section('content')

<div class="container">
    <h1>Edit Book</h1>

    <div class="col-lg-8">
        <form action="/dashboard/books/{{$book->id}}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{old('title', $book->title)}}">
                @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="book_code" class="form-label">Book Code</label>
                <input type="text" class="form-control @error('book_code') is-invalid @enderror" id="book_code" name="book_code" required value="{{old('book_code', $book->book_code)}}">
                @error('book_code')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label"> Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" required value="{{old('author', $book->author)}}">
                @error('author')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label"> Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    {{-- <option selected>Open this select menu</option> --}}
                    @foreach ($categories as $category)
                        @if (old('category_id', $category->id ) == $book->categories()->get()[0]->id)
                            <option value="{{ $category->id }}" selected>{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>

                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" required value="{{old('stock', $book->stock)}}">
                @error('stock')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Book</button>

        </form>
    </div>
</div>
@endsection