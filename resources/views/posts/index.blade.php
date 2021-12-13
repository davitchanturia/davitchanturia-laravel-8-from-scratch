<x-layout>

    @include('posts.header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        {{-- if პირობით ვამოწმებთ თუ არის ბაზაში ერთი პოსტი მაინც --}}
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />

            {{-- გამოგვაქვს გვერდებზე გადასასვლელი ლინკების დივი --}}
            {{ $posts->links() }}
        @else

            <p class="text-center">no posts yet, please check later</p>

        @endif

    </main>

</x-layout>
