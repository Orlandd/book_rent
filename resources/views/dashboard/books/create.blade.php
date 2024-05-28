@extends('dashboard.layouts.main')

@section('content')

<div class="container">
    <h1>Add Book</h1>

    <div class="col-lg-8">
        <form action="/dashboard/books" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{old('title')}}">
                @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="book_code" class="form-label">Book Code</label>
                <input type="text" class="form-control @error('book_code') is-invalid @enderror" id="book_code" name="book_code" required autofocus value="{{old('book_code')}}">
                @error('book_code')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label"> Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" required autofocus value="{{old('author')}}">
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
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" required autofocus value="{{old('stock')}}">
                @error('stock')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Book</button>

        </form>
    </div>
</div>
@endsection