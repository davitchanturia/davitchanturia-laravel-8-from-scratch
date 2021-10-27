<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-7 rounded-xl">

            <h1 class="text-center uppercase  font-bold text-lg" >Log In!</h1>

            <form action="/sessions" method="post">
                @csrf

                <label for="email" 
                       class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6">
                       email
                </label>
                <input type="email" 
                       name="email" 
                       class="border border-gray-400 p-2 w-full" 
                       value="{{ old('email') }}">

                @error('email')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror


                <label for="password" 
                       class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6">
                       password
                </label>
                <input type="password"
                       name="password" 
                       class="border border-gray-400 p-2 w-full" >

                   
                @error('name')
                   <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror


                <button type="submit" class="bg-blue-400 tex-white rounded py-2 px-4 hover:bg-blue-500 mt-6 hover:text-white transition-all	">Log In</button>
            </form>

        </main>

    </section>

</x-layout>