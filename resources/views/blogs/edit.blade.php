<x-layout>
    <section class="py-[80px]">
        <div class="container mx-auto px-5">

            <div class="flex justify-between items-center mb-5">
                <h1 class="text-2xl font-bold text-gray-700">Edit Blog</h1>
                <a href="{{ route('blogs.index') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
            </div>

            @if (session('success'))
                <div class="bg-green-500 text-white p-3 mb-3">
                    {{ session('success') }}
                </div>
            @endif


            <form method="POST" action="{{ route('blogs.update', $blog->id) }}" enctype="multipart/form-data" class="px-8 py-8 bg-gray-200 rounded-md">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ $blog->title }}"
                           class="border border-gray-200 py-3 px-3 w-full rounded-[6px] focus:outline-none focus:border-blue-500 transition ease-in-out duration-300">
                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                    <textarea name="content" id="content"
                              class="border border-gray-200 py-3 px-3 w-full rounded-[6px] focus:outline-none focus:border-blue-500 transition ease-in-out duration-300 h-[120px]">{{ $blog->content }}</textarea>
                    @error('content')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>

                    <select name="category_id" id="category" class="border border-gray-200 py-3 px-3 w-full rounded-[6px] focus:outline-none focus:border-blue-500 transition ease-in-out duration-300">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                    <input type="file" name="image" id="image" class="border border-gray-200 py-3 px-3 w-full rounded-[6px] focus:outline-none focus:border-blue-500 transition ease-in-out duration-300">
                    @error('image')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Blog</button>
                </div>
            </form>

        </div>
    </section>

</x-layout>
