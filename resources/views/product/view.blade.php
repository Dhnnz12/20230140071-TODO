<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-4">
                        <strong class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name:</strong>
                        <p class="mt-1 text-lg">{{ $product->name }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity:</strong>
                        <p class="mt-1 text-lg">{{ $product->quantity }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price:</strong>
                        <p class="mt-1 text-lg">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="block text-sm font-medium text-gray-700 dark:text-gray-300">Owner:</strong>
                        <p class="mt-1 text-lg">{{ $product->user->name ?? $product->user_id }}</p>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <a href="{{ route('product.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <a href="{{ route('product.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
