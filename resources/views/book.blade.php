@extends('layouts.main')

@section('container')

<div class="container">
    
    <a href="/books" class="text-decoration-none text-black fs-2"><i class="bi bi-arrow-left-circle-fill"></i> Back</a>

    <div class="row-lg-3 d-flex mt-3">
        <div class="col-lg-3">
            <div class="card text-bg-dark shadow border-0" >
                <img src="https://source.unsplash.com/300x400?book" class="card-img border-0"  alt="...">
            </div>
            <div class="d-grid">
                @if (auth()->guest())
                    <button type="submit" class="btn btn-dark mt-2 form-control" disabled>Borrow</button>
                    <p class="text-center fs-5">Login required</p>
                @else
                <form action="/rentLogs" method="post">
                    @csrf
                    <input type="text" name="book" id="book" value="{{$book->id}}" hidden>
                    <input type="text" name="user" id="user" value="{{auth()->user()->id}}" hidden>
                    @if ($book->stock == 0)
                        <button type="submit" class="btn btn-dark mt-2 form-control" disabled>Borrow</button>
                    @else
                        <button type="submit" class="btn btn-dark mt-2 form-control" >Borrow</button>
                    @endif
                </form>
                @endif
                
            </div>
        </div>

        <div class="col-lg-5 mx-5">
            <h1>{{$book->title}}</h1>
            <hr>
            <h5>{{$book->author}}</h5>
            <h5>
                @foreach ($book->categories()->get() as $category)
                    {{$category->name}}
                @endforeach
            </h5>
            @if ($book->stock == 0)
                <h6>Stock : Not Available</h6>
                
            @else
                <h6>Stock : {{$book->stock}}</h6>
            @endif
            <hr>
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, quod? Eum officiis libero doloribus ipsa nesciunt odit impedit aliquid quod odio, obcaecati minima. Commodi unde eum eos quia, eius exercitationem!</p>
            
            
        </div>
    </div>

</div>

@endsection