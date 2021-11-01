<x-layout>

    <section class="px-6 py-8">
        
        <form action="/admin/posts" method="post" 
              class="border border-gray-200 p-6 rounded-xl max-w-md m-auto">
            @csrf

            {{-- title --}}
            <label for="title" 
                   class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6">
                   title
            </label>
            <input type="text" 
                   name="title" 
                   class="border border-gray-400 p-2 w-full" 
                   value="{{ old('title') }}">

            @error('title')
                <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
            @enderror


            {{-- slug --}}

            <label for="slug" 
                   class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6">
                   slug
            </label>
            <input type="text" 
                   name="slug" 
                   class="border border-gray-400 p-2 w-full" 
                   value="{{ old('slug') }}">

            @error('slug')
                <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
            @enderror


            {{-- excerpt --}}
            <label for="excerpt" 
                class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6">
                excerpt
            </label>
            <input  id="excerpt" 
                    name="excerpt" 
                    class="w-full border border-gray-400 p-2"
                    value="{{ old('excerpt') }}"
                    >
                    
            {{-- </input> --}}

            @error('excerpt')
                <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
            @enderror


            {{-- body --}}
            <label for="body" 
                class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6">
                body
            </label>
            <input  id="body" 
                    name="body" 
                    class="w-full border border-gray-400 p-2"
                    value="{{ old('body') }}"
                    >
                    {{-- </input> --}}

            @error('body')
                <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
            @enderror

            <div class="mb-6">

                <label for="category" 
                       class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6">
                    category
                </label>

                <select name="category_id" id="category">

                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                         <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}> {{ $category->name}} </option>   
                     @endforeach

                    
                </select>

            </div>


            {{-- button --}}
            <button type="submit" 
                    class="bg-blue-400 tex-white rounded py-2 px-4 hover:bg-blue-500 mt-6 hover:text-white transition-all	">
                Publish
            </button>
        </form>


    </section>

</x-layout>