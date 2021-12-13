<x-layout>

    <x-settings :heading="'Edit Post: '.$post->title">

        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data"
            class="border border-gray-200 p-6 rounded-xl mt-7 max-w-md m-auto">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="$post->title" />
            <x-form.input name="slug" :value="$post->slug" />
            <x-form.input name="excerpt" :value="$post->excerpt" />
            <x-form.input name="thumbnail" type="file" />
            <div class="p-4">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" width="100" class="rounded-xl">
            </div>
            <x-form.input name="body" :value="$post->body" />

            <div class="mb-6">

                <x-form.label name="category" />

                <select name="category_id" id="category">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                    <x-form.error name="category" />
                </select>

            </div>

            <x-form.button>Update</x-form.button>
        </form>

    </x-settings>

</x-layout>
