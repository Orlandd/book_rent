@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-center">
        @if (request('category'))
                <a class="mt-5 text-decoration-none text-black fs-1 text-center" href="/books">Category : {{request('category')}}</a>
        @else
                <a class="mt-5 text-decoration-none text-black fs-1 text-center" href="/books">All Books</a>
        @endif
    </div>

    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <form action="/books">
                @if (request('category'))
                <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search book/author" name="search" value="{{request('search')}}">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="btn-group mb-3">
        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
        </button>
        <ul class="dropdown-menu">
            <form action="/books">
                @foreach ($categories as $category)
                    <li><a class="dropdown-item " href="/books?category={{$category->name}}">{{$category->name}}</a></li>
                @endforeach
            </form>
        </ul>
    </div>
    <div class="row row-cols-2 row-cols-md-6 g-4 mb-5">
        @foreach ($books as $book)
            <div class="col">
                <div class="card h-100  border-0 shadow">
                        <img src="https://source.unsplash.com/500x500?book" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <hr class="my-3" />
                        <h6 class="card-title">{{$book->author}}</h6>
                        <a href="/books/{{$book->id}}" class="stretched-link"></a>
                        <h6 class="card-title">
                            @foreach ($book->categories()->get() as $category)
                                {{$category->name}}</h6>
                            @endforeach
                        </div>
                        
                </div>
            </div>

        @endforeach
    </div>

@endsection