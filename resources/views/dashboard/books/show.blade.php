@extends('dashboard.layouts.main')

@section('content')

<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success " role="alert">
        {{session('success')}}
        </div>
    @endif    

    <div class="row-lg-3 d-flex">
        <div class="col-lg-3">
            <div class="card text-bg-dark shadow border-0" >
                <img src="https://source.unsplash.com/300x400?book" class="card-img border-0"  alt="...">
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

            <h6>Stock : {{$book->stock}}</h6>
            <hr>
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, quod? Eum officiis libero doloribus ipsa nesciunt odit impedit aliquid quod odio, obcaecati minima. Commodi unde eum eos quia, eius exercitationem!</p>
        </div>
    </div>

</div>
@endsection