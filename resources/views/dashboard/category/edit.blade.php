@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>

        <div class="col-lg-8">
            <form action="/dashboard/categories/{{ $category->id }}" method="post" class="mb-5"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" required autofocus value="{{ old('name', $category->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Update Category</button>

            </form>
        </div>
    </div>
@endsection
