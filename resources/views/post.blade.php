@extends('layout')

@section('content')
    
    <article class="myArticel">
        <h1>{{ $post->title }}</h1>

       <div>
           <p>{!! $post->body !!}</p> 

        </div>

       <a href="/">go back</a>
    </article>

@endsection


    
    
