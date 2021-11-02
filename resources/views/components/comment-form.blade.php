@props(['commy'])

@auth
      <form action="/posts/{{$commy->slug}}/comments" 
        method="post" 
        class="border border-gray-300 p-6 rounded-xl mt-20">
       @csrf

         <div class="flex space-x-4 items-center" >
             <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" class="rounded-full" alt="" width="40" height="40">
             <h2 class="ml-4" >want to participate?</h2>
         </div>

         <div class="mt-6">

             <textarea name="body" 
                       class="p-2 w-full text-sm focus:outline-none focus:ring" 
                       rows="5" 
                       placeholder="quick, things of something to write"
                       required></textarea>

            @error('body')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
         </div>

         <div class="mt-2 flex justify-end border-t py-5">
             <button type="submit" class="bg-blue-400 px-7 py-1 text-white rounded-xl font-semibold hover:bg-blue-200 hover:text-black"> Post </button>
         </div>

      </form>

    @else
     <p> <a href="/register" class="hover:underline font-bold capitalize"> register </a>  or <a href="/login" class="hover:underline font-bold capitalize"> logi in </a>  if you want to comment </p>
 @endauth