@props(['heading'])

<section class="px-6 py-8 max-w-4xl m-auto">

    <h1 class="capitalize font-semibold text-xl border-b pb-3">
        {{ $heading }}
    </h1>
    
    <div class="flex">

        <aside class="w-48 mt-7 flex-shrink-0" >
             <h4 class="font-semibold mb-3">links</h4>
             <ul>
                 <li> <a href="/admin/posts/create" class=" {{ request()->is('admin/posts/create') ? 'text-blue-400' : '' }}">New Post</a> </li>
                 <li> <a href="/admin/posts" class=" {{ request()->is('admin/posts') ? 'text-blue-400' : '' }}">All Posts</a> </li>
             </ul>
        </aside>

        <main class="flex-1">
             {{$slot}}
        </main>    
    </div>


</section>