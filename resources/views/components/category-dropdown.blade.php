<x-dropdown>

    <x-slot name="trigger">

        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left inline-flex ">

            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-svg />
        </button>

    </x-slot>



    <x-dropdown-item 
        href="{{ route('home', [http_build_query(request()->except('category', 'page'))]) }}"
        :active="request()->routeIs('home')">All</x-dropdown-item>


    @foreach ($categories as $cat)

        <x-dropdown-item
            href="{{ route('home', ['category='.$cat->slug.'&&'.http_build_query(request()->except('category', 'page'))] ) }}"
            class="block text-left px-3 text-sm leading-5" :active="request()->is('categories/{{ $cat->slug }}')">
            {{ ucwords($cat->name) }}
        </x-dropdown-item>

    @endforeach

</x-dropdown>
