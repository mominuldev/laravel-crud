<x-layout>
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">Users</h2>
                <a href="{{ route('users.create') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create User</a>
            </div>
            @if (session('success'))
                <div class="bg-green-500 text-white p-3 mb-3">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </section>

</x-layout>
