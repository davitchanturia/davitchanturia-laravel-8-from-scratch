@extends('layout')



@section('content')


    @foreach ($post as $postX)
        

    <div class="myArticel">
        
        <h1>
            <a href="/posts/{{ $postX->slug }}">
                {{ $postX->title }}
            </a>
        </h1>

        <div class="body">
            {{ $postX->excerpt }}
        </div>

    </div>

    @endforeach

@endsection

