@props(['name'])

<button type="submit" 
        class="bg-blue-400 tex-white font-semibold rounded py-2 px-4 hover:bg-blue-500 mt-6 hover:text-white transition-all capitalize">
        {{ $slot }}
</button>