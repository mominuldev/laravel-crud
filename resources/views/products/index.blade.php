<x-layout>
    <div class="container mx-auto py-10">
        <div class="flex justify-between mb-10">
            <h1 class="text-2xl font-bold">Products</h1>
            <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Product</a>

        </div>



        <div class="text-left">

            @if (session('message'))
            <p style="color: green;">{{ session('message') }}</p>
            @endif


            <table class="w-full">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-2 py-2">#SL</th>
                        <th class=" border border-gray-300 px-2 py-2">Image</th>
                        <th class=" border border-gray-300 px-2 py-2">Name</th>
                        <th class=" border border-gray-300 px-2 py-2">Description</th>
                        <th class=" border border-gray-300 px-2 py-2">Price</th>
                        <th class=" border border-gray-300 px-2 py-2">SKU</th>
                        <th class=" border border-gray-300 px-2 py-2">Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="border border-gray-300">
                        <td class=" px-2 py-2 border-r border-gray-300">{{ $product->id }}</td>
                        <td class="px-2 py-2 border-r border-gray-300"><img src="{{ url($product->image) }}" width="50" height="50" /> </td>
                        <td class="px-2 py-2 border-r border-gray-300">{{ $product->name }}</td>
                        <td class="px-2 py-2 border-r border-gray-300">{{ $product->description }}</td>
                        <td class="px-2 py-2 border-r border-gray-300">$ {{ $product->price }}</td>
                        <td class="px-2 py-2 border-r border-gray-300">{{ $product->sku }}</td>
                        <td class="px-2 py-2 flex gap-2">
                            <a href="{{ route('products.show', $product) }}" 2
                                class="bg-blue-500 text-white px-4 py-2 rounded-md">View</a>
                            <a href="{{ route('products.edit', $product) }}"
                                class="bg-green-500 text-white px-4 py-2 rounded-md">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-4 py-2 rounded-md border-0">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="mt-10">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layout>
