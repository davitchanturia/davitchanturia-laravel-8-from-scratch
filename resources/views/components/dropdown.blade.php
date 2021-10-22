@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">

    {{-- trigger --}}
    <div @click="show = ! show">

        {{ $trigger }}

    </div>
    
    {{-- links --}}
    <div x-show=" show " class="py-2 absolute bg-gray-100 w-full rounded-xl mt-2">
      
        {{ $slot }}
        
      
    </div>

</div>