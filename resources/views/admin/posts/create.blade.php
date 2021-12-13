<x-layout>

    <x-settings heading="Publish New Post"> 

        <form action="{{ route('create.post') }}" method="post" enctype="multipart/form-data"
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
                @foreach ($categories as $category)
                     <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}> {{ $category->name}} </option>   
                 @endforeach

                 <x-form.error name="category" />
            </select>

            </div>

            {{-- button --}}
            <x-form.button>public</x-form.button>
        </form>

    </x-settings>

</x-layout>