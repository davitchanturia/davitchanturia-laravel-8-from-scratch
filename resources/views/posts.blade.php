@extends('layout')



@section('content')


    @foreach ($posts as $post)
        

    <div class="myArticel">
        
        <h1>
            <a href="/posts/{{$post->slug}}">
                {{$post->title}}
            </a>
        </h1>

        <p>
            by <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a>  in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
         </p>

        <div class="body">
            {{$post->excerpt}}
        </div>

    </div>

    @endforeach

@endsection

