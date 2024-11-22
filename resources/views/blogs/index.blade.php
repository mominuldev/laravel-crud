<x-layout>
    <x-slot name="title">
        Blogs
    </x-slot>
    <section class="py-[80px]">
        <div class="container mx-auto px-5">

            <div class="flex justify-between items-center mb-5">
                <h1 class="text-2xl font-bold text-gray-700">Blogs</h1>
                <a href="{{ route('blogs.create') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Blog</a>
            </div>

            @if (session('success'))
                <div class="bg-green-500 text-white p-3 mb-3">
                    {{ session('success') }}
                </div>
            @endif


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Content
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Updated At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($blogs as $blog)
                        <tr class=" border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $blog->id }}
                            </th>
                            <td class="px-6 py-4">
                                <img src="{{ url('images/' . $blog->image) }}" alt="" class="w-10 h-10 object-cover rounded-full">
                            </td>
                            <td class="px-6 py-4">
                                {{ $blog->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $blog->content }}
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 bg-blue-200 text-blue-800 rounded-full">{{ $blog->category->name }}</span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $blog->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $blog->updated_at }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('blogs.show', $blog->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="{{ route('blogs.edit', $blog->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">No blogs found.</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
</x-layout>
