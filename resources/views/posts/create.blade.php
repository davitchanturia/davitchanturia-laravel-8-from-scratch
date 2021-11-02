<x-layout>

    <section class="px-6 py-8">

        <h1 class="capitalize text-center font-semibold text-xl">publish new post</h1>
        
        <form action="/admin/posts" method="post" enctype="multipart/form-data"
              class="border border-gray-200 p-6 rounded-xl mt-7 max-w-md m-auto">
            @csrf

             
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="excerpt" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.input name="body" />

            

           
            <div class="mb-6">

                <x-form.label name="category"/>

                <select name="category_id" id="category">

                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                         <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}> {{ $category->name}} </option>   
                     @endforeach

                     <x-form.error name="category" />
                </select>

            </div>


            {{-- button --}}
            <x-form.button>public</x-form.button>
        </form>


    </section>

</x-layout>