<x-layout>

    @include('posts.header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        {{-- if პირობით ვამოწმებთ თუ არის ბაზაში ერთი პოსტი მაინც --}}
        @if ($posts->count())
            <x-posts-grid :posts="$posts"/>
        @else   
        
            <p class="text-center">no posts yet, please check later</p>
        
        @endif

    </main>

</x-layout>


{{-- @extends('layout')



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

@endsection --}}

