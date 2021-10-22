
@php

  $classes  = "block text-left px-3 text-sm leading-5 hover:bg-blue-300 hover:text-white";

   if ($active)  
   {
        $classes .= ' bg-blue-500 text-white';
   }
   
@endphp


<a href="{{ $href }}" class="{{ $classes }}">

    {{ $slot }}

</a>