<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-3xl bg-clip-text text-transparent bg-gradient-to-r from-emerald-500 to-teal-500 dark:from-emerald-400 dark:to-teal-400 leading-tight">
                {{ __('Products Inventory') }}
            </h2>
            <div class="flex gap-3">
                @can('export-product')
                <button class="inline-flex items-center px-4 py-2 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm border border-emerald-500 text-emerald-600 dark:text-emerald-400 font-semibold rounded-xl hover:bg-emerald-50 dark:hover:bg-emerald-900/30 transition-all shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                    <svg class="-ml-1 mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Export
                </button>
                @endcan
                @can('manage-product')
                <x-add-product :url="route('product.create')" name="Product" />
                @endcan
            </div>
        </div>
    </x-slot>

    <!-- Vibrant Gradient Background -->
    <div class="py-12 bg-gradient-to-br from-emerald-50 via-white to-teal-50 dark:from-gray-900 dark:via-slate-800 dark:to-gray-900 min-h-screen relative overflow-hidden">
        
        <!-- Subtle Glow Orbs -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-gradient-to-br from-teal-400 to-emerald-400 rounded-full blur-[120px] opacity-20 dark:opacity-20 animate-pulse"></div>
            <div class="absolute bottom-[0%] right-[0%] w-[50%] h-[50%] bg-gradient-to-tl from-cyan-400 to-blue-400 rounded-full blur-[100px] opacity-10 dark:opacity-10" style="animation-delay: 1s;"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            @if (session('success'))
                <div class="mb-6 bg-emerald-100/80 dark:bg-emerald-900/40 backdrop-blur-sm border border-emerald-400 text-emerald-800 dark:text-emerald-300 px-6 py-4 rounded-2xl shadow-sm flex items-center justify-between animate-fade-in-down" role="alert">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="block sm:inline font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl shadow-2xl rounded-[2rem] border border-white/60 dark:border-gray-700/60 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">All Products</h3>
                </div>
                
                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-left table-auto whitespace-nowrap">
                        <thead>
                            <tr class="bg-gray-50/50 dark:bg-gray-900/50 text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider">
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">No.</th>
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">Product Name</th>
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">Stock</th>
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">Price</th>
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">Owner</th>
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse($products as $product)
                                <tr class="hover:bg-gray-50/80 dark:hover:bg-gray-700/50 transition-colors duration-200">
                                    <td class="px-6 py-4 text-gray-500 dark:text-gray-400">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $product->name }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $product->qty > 10 ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' }}">
                                            {{ $product->qty }} Items
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300 font-medium">
                                        Rp {{ number_format($product->price, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-indigo-400 to-purple-400 flex items-center justify-center text-white font-bold text-xs shadow-sm">
                                                {{ substr($product->user->name ?? 'U', 0, 1) }}
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->user->name ?? 'Unknown' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 flex gap-2 justify-center">
                                        <a href="{{ route('product.show', $product->id) }}" class="p-2 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-500 hover:text-white rounded-lg transition-all duration-200" title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>
                                        </a>
                                        @can('update', $product)
                                        <x-edit-product :url="route('product.edit', $product->id)" />
                                        @endcan
                                        @can('delete', $product)
                                        <x-delete-product :url="route('product.delete', $product->id)" />
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                                            <svg class="h-12 w-12 mb-4 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <p class="text-lg font-medium">No products found</p>
                                            <p class="text-sm mt-1 text-gray-400">Get started by creating a new product.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
