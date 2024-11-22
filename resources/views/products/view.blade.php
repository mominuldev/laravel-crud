<x-layout>
    <div class="container mx-auto">
        <div class="py-10">
            <h1 class="text-4xl font-bold">Product Title: {{ $product->name }}</h 1>
                <p class="text-gray-600">Product Description: {{ $product->description }}</p>
                <p class="text-gray-800 font-bold text-xl mt-4">Price: ${{ $product->price }}</p>
                <a href="{{ route('products.edit', $product) }}" class="text-blue-500">Edit</a>
        </div>
    </div>
</x-layout>