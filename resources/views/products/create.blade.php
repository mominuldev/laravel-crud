<x-layout>
    <section class="py-10">
        <div class="mx-[600px] mx-auto">
            <div class="flex justify-between items-center mb-5">
                <h1 class="text-2xl font-bold">Create a new product</h1>
                <a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back To Product</a>
            </div>
            

            @if (session('message'))
                <p style="color: green;">{{ session('message') }}</p>
            @endif

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="px-8 py-8 bg-gray-200 rounded-md">
                @csrf

                <div class="mb-3">
                    <label for="name" class="block mb-1 font-medium text-sm">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="border border-gray-200 py-2 px-3 w-full rounded-[6px] focus:outline-none focus:border-blue-500 transition ease-in-out duration-300">
                    @error('name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="block mb-1 font-medium text-sm">Description</label>
                    <textarea name="description" id="description" class="border border-gray-200 py-2 px-3 w-full rounded-[6px] focus:outline-none focus:border-blue-500 transition ease-in-out duration-300">{{ old('description') }}</textarea>
                    @error('description')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="block mb-1 font-medium text-sm">Price</label>
                    <input type="text" name="price" id="price" value="{{ old('price') }}" class="border border-gray-200 py-2 px-3 w-full rounded-[6px] focus:outline-none focus:border-blue-500 transition ease-in-out duration-300">
                    @error('price')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sku" class="block mb-1 font-medium text-sm">Sku</label>
                    <input type="text" name="sku" id="sku" value="{{ old('sku') }}" class="border border-gray-200 py-2 px-3 w-full rounded-[6px] focus:outline-none focus:border-blue-500 transition ease-in-out duration-300">
                    @error('sku')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="block mb-1 font-medium text-sm">Image</label>
                    <input type="file" name="image" id="image" class="border border-gray-300 py-2 px-3 w-full rounded-[6px] focus:outline-none focus:border-blue-500 transition ease-in-out duration-300">
                    @error('image')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
            </form>
        </div>
    </section>
</x-layout>