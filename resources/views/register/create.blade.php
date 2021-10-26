<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-7 rounded-xl">

            <h1 class="text-center uppercase  font-bold text-lg" >register!</h1>

            <form action="/register" method="post">
                @csrf

                <label for="name" 
                       class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6"> 
                       name
                </label>

                <input type="text" 
                       name="name" 
                       class="border border-gray-400 p-2 w-full" 
                       value="{{ old('name') }}">  {{-- old('name')-საშალებით ინფუთს ენიჭება უკვე ჩაწერილი ველიუ რადგან თუ ვალიდაცია არ დააკმაყოფილა რომელიმე ინფუთმა ყველა არ წაიშალოს --}}

                @error('name')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror



                <label for="username" 
                       class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6">
                       username
                </label>
                <input type="text" 
                       name="username"
                       class="border border-gray-400 p-2 w-full" 
                       value="{{ old('username') }}">

                @error('username')
                     <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror



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


                <button type="submit" class="bg-blue-400 tex-white rounded py-2 px-4 hover:bg-blue-500 mt-6 hover:text-white transition-all	">submit</button>
            </form>

        </main>

    </section>

</x-layout>