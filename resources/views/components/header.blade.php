<header class="bg-gray-300 py-2">
    <div class="container mx-auto px-5">
        <div class="flex justify-between items-center py-4">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">My Shop</a>
            <nav>
                <ul class="flex space gap-4">
                    <li><a href="{{ route('home') }}" class="text-gray-800">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-gray-800">Products</a></li>
                    <li><a href="{{ route('products.create') }}" class="text-gray-800">Add Product</a></li>
                    <li><a href="{{ route('blogs.index') }}" class="text-gray-800">Blogs</a></li>
                    <li><a href="{{ route('users.index') }}" class="text-gray-800">User</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
