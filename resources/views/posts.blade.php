@extends('layout')



@section('content')


    @foreach ($posts as $post)
        

    <div class="myArticel">
        
        <h1>
            <a href="/posts/{{$post->id}}">
                {{$post->title}}
            </a>
        </h1>

        <div class="body">
            {{$post->excerpt}}
        </div>

    </div>

    @endforeach

@endsection

