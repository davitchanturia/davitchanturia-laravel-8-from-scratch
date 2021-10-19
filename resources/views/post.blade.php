@extends('layout')

@section('content')
    
    <article class="myArticel">
        
        <h1>{{ $post->title }}</h1>

        <p>
           by <a href="#">{{$post->user->name}}</a>  in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>

       <div>
           <p>{!! $post->body !!}</p> 

        </div>

       <a href="/">go back</a>
    </article>

@endsection


    
    
