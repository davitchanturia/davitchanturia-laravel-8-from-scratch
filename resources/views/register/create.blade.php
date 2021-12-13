<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-7 rounded-xl">

            <h1 class="text-center uppercase  font-bold text-lg">register!</h1>

            <form action="{{ route('register') }}" method="post">
                @csrf

                <x-form.input name="name" />
                <x-form.input name="username" />
                <x-form.input name="email" />
                <x-form.input name="password" type="password" />
                
                <x-form.button>submit</x-form.button>
            </form>

        </main>

    </section>

</x-layout>
