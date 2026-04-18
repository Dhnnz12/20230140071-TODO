<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1a2233] border border-gray-700/50 overflow-hidden shadow-2xl rounded-2xl">
                <div class="p-8">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('product.index') }}" class="p-2 text-gray-400 hover:text-white hover:bg-gray-700/50 rounded-xl transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                            </a>
                            <div>
                                <h1 class="text-3xl font-bold text-white tracking-tight">Product Detail</h1>
                                <p class="text-gray-400 text-sm mt-1">Viewing product #{{ $product->id }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <x-edit-product :url="route('product.edit', $product->id)" />
                            <x-delete-product :url="route('product.delete', $product->id)" />
                        </div>
                    </div>

                    <!-- Details Table -->
                    <div class="space-y-0 rounded-xl border border-gray-700/30 overflow-hidden shadow-inner">
                        <!-- Product Name -->
                        <div class="flex justify-between items-center p-5 bg-gray-800/20 border-b border-gray-700/30">
                            <span class="text-gray-400 font-medium tracking-wide">Product Name</span>
                            <span class="text-white font-bold text-lg">{{ $product->name }}</span>
                        </div>

                        <!-- Quantity -->
                        <div class="flex justify-between items-center p-5 bg-gray-800/10 border-b border-gray-700/30">
                            <span class="text-gray-400 font-medium tracking-wide">Quantity</span>
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-xs font-bold uppercase tracking-wider">
                                    {{ $product->qty }} In Stock
                                </span>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="flex justify-between items-center p-5 bg-gray-800/20 border-b border-gray-700/30">
                            <span class="text-gray-400 font-medium tracking-wide">Price</span>
                            <span class="text-white font-bold text-xl tracking-tight">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>

                        <!-- Owner -->
                        <div class="flex justify-between items-center p-5 bg-gray-800/10 border-b border-gray-700/30">
                            <span class="text-gray-400 font-medium tracking-wide">Owner</span>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold text-xs shadow-lg ring-2 ring-indigo-500/20">
                                    {{ strtoupper(substr($product->user->name ?? '?', 0, 1)) }}
                                </div>
                                <span class="text-white font-semibold">{{ $product->user->name ?? 'Unknown' }}</span>
                            </div>
                        </div>

                        <!-- Created At -->
                        <div class="flex justify-between items-center p-5 bg-gray-800/20 border-b border-gray-700/30">
                            <span class="text-gray-400 font-medium tracking-wide">Created At</span>
                            <span class="text-white font-medium italic">{{ $product->created_at->format('d M Y, H:i') }}</span>
                        </div>

                        <!-- Updated At -->
                        <div class="flex justify-between items-center p-5 bg-gray-800/10">
                            <span class="text-gray-400 font-medium tracking-wide">Updated At</span>
                            <span class="text-white font-medium italic">{{ $product->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
