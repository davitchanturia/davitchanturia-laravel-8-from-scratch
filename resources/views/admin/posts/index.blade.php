<x-layout>


    {{-- dashboard table --}}

    <x-settings heading="Manage Posts">

        <div class="flex flex-col mt-7">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">

                            <tbody>

                                @foreach ($posts as $post)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <a href="/posts/{{ $post->slug }}">
                                                {{ $post->title }}
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="/admin/posts/{{ $post->id }}/edit"
                                                class="text-green-400 font-semibold hover:text-green-700">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="/admin/posts/{{ $post->id }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="text-red-400 font-semibold hover:text-red-700">Delete</button>

                                            </form>

                                        </td>
                                    </tr>

                                @endforeach




                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-settings>




</x-layout>
