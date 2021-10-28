@props(['comm'])

<article class="flex bg-gray-100 p-6 rounded-xl border border-gray-300 space-x-4">

   <div class="flex-shrink-0">
       <img src="https://i.pravatar.cc/60?u={{$comm->id}}" class="rounded-xl" alt="" width="60" height="60">
   </div>

   <div class=""> 
       <header>
           <h3 class="font-bold"> {{ $comm->author->username }} </h3>
           <p class="text-xs" >posted 
               <time>  {{ $comm->created_at}} </time> 
           </p> 
       </header>

       <p class="mt-5"> {{ $comm->body }} </p>
   </div>

</article>