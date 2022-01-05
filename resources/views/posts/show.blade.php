<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 ">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="{{asset('images/lary-avatar.svg')}}" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="{{ route('home', ['authors='.$post->author->username]) }}">{{ $post->author->name }}</a>
                            </h5>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="{{ route('home') }}"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <x-back-icon />
                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-post-category-section :post="$post" />

                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <p>{{ $post->body }}</p>
                    </div>
                </div>

                <section class="col-span-8 col-start-5 space-y-6">

                    <x-comment-form :commy="$post" />


                    <!-- post comments -->

                    @foreach ($post->comments as $comment)

                        <x-post-comment :comm="$comment" />

                    @endforeach

                </section>
            </article>
        </main>

    </section>


</x-layout>
