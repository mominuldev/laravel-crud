<x-layout>
    <div class="container mx-auto py-10">
        <h1 class="text-4xl font-bold">Products</h1>

        <div class="grid grid-cols-3 gap-4 mt-4">
            {{-- {{ 
        
                dd($products)
            }} --}}
            @foreach ($products as $product)
                <div class="bg-white p-4 shadow">
                    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                    <p class="text-gray-600">{{ $product->description }}</p>
                    <p class="text-gray-800 font-bold text-xl mt-4">${{ $product->price }}</p>
                    <a href="{{ route('products.show', $product) }}" class="text-blue-500">View</a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>