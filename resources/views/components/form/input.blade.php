@props(['name', 'type' => 'text'])

<div>

    <x-form.label name="{{$name}}"/>

     <input type="{{$type}}" 
            name="{{$name}}" 
            class="border border-gray-400 p-2 w-full" 
            value="{{ old($name) }}">

     <x-form.error name="{{$name}}"/>

</div>