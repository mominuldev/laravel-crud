<x-layout>
    <div class="container mx-auto">
        <div class="py-10">
            <h1 class="text-4xl font-bold">{{ $product->name }}</h1>
            <p class="text-gray-600">{{ $product->description }}</p>
            <p class="text-gray-800 font-bold text-xl mt-4">${{ $product->price }}</p>
            <p class="text-gray-800 font-bold text-xl mt-4">{{ $product->sku }}</p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-40 h-40 object-cover mt-4">
            <a href="{{ route('products.edit', $product) }}" class="text-blue-500">Edit</a>
        </div>
    </div>
</x-layout>