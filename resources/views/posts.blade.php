@extends('layout')



@section('content')


    @foreach ($posts as $postx)
        

    <div class="myArticel">
        
        <h1>
            <a href="/posts/{{$postx->slug}}">
                {{$postx->title}}
            </a>
        </h1>

        <p>
            <a href="/categories/{{$postx->category->slug}}">{{$postx->category->name}}</a>
        </p>

        <div class="body">
            {{$postx->excerpt}}
        </div>

    </div>

    @endforeach

@endsection

