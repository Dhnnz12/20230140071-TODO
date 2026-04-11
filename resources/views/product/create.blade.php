<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-cyan-600 dark:from-indigo-400 dark:to-cyan-400 leading-tight">
            {{ __('Add New Product') }}
        </h2>
    </x-slot>

    <!-- Super vibrant and modern gradient background -->
    <div class="py-12 bg-gradient-to-br from-indigo-50 via-white to-cyan-50 dark:from-gray-900 dark:via-slate-800 dark:to-gray-900 min-h-screen relative overflow-hidden">
        
        <!-- Decorative background elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-[10%] -right-[10%] w-[40%] h-[40%] bg-gradient-to-br from-indigo-400 to-purple-400 rounded-full blur-[120px] opacity-20 dark:opacity-30"></div>
            <div class="absolute top-[60%] -left-[10%] w-[30%] h-[50%] bg-gradient-to-tr from-cyan-400 to-emerald-400 rounded-full blur-[100px] opacity-20 dark:opacity-20 animate-pulse"></div>
        </div>

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <!-- Premium Glassmorphism Card -->
            <div class="bg-white/70 dark:bg-gray-800/60 backdrop-blur-2xl rounded-[2rem] shadow-2xl overflow-hidden border border-white/50 dark:border-gray-700/50 transform transition-all duration-500">
                <div class="p-10 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product Details</h3>
                        <p class="mt-2 text-md text-gray-500 dark:text-gray-400">Please provide the details to create a new product inventory.</p>
                    </div>

                    <form method="POST" action="{{ route('product.store') }}" novalidate>
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <!-- Product Name Input -->
                            <div class="col-span-2 relative group">
                                <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors group-focus-within:text-indigo-600 dark:group-focus-within:text-indigo-400">Product Name <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" /></svg>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                        class="block w-full pl-12 pr-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm focus:bg-white dark:focus:bg-gray-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 {{ $errors->has('name') ? 'border-rose-500 ring-1 ring-rose-500' : '' }}" 
                                        placeholder="E.g. Wireless Noise-Cancelling Headphones" required>
                                </div>
                                @error('name') 
                                    <p class="text-rose-500 text-sm mt-2 flex items-center font-medium animate-pulse"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Quantity Input -->
                            <div class="relative group">
                                <label for="qty" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors group-focus-within:text-cyan-600 dark:group-focus-within:text-cyan-400">Stock Quantity <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" /></svg>
                                    </div>
                                    <input type="number" name="qty" id="qty" value="{{ old('qty') }}" 
                                        class="block w-full pl-12 pr-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm focus:bg-white dark:focus:bg-gray-800 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 {{ $errors->has('qty') ? 'border-rose-500 ring-1 ring-rose-500' : '' }}" 
                                        placeholder="0" required>
                                </div>
                                @error('qty') 
                                    <p class="text-rose-500 text-sm mt-2 flex items-center font-medium animate-pulse"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Price Input -->
                            <div class="relative group">
                                <label for="price" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors group-focus-within:text-emerald-600 dark:group-focus-within:text-emerald-400">Unit Price (Rp) <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <span class="font-bold">Rp</span>
                                    </div>
                                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" 
                                        class="block w-full pl-12 pr-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm focus:bg-white dark:focus:bg-gray-800 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300 {{ $errors->has('price') ? 'border-rose-500 ring-1 ring-rose-500' : '' }}" 
                                        placeholder="0.00" required>
                                </div>
                                @error('price') 
                                    <p class="text-rose-500 text-sm mt-2 flex items-center font-medium animate-pulse"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Owner Input -->
                            <div class="col-span-2 relative group">
                                <label for="user_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors group-focus-within:text-purple-600 dark:group-focus-within:text-purple-400">Owner / Assigner <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                                    </div>
                                    <select name="user_id" id="user_id" 
                                        class="block w-full pl-12 pr-10 py-3 appearance-none bg-white/50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm focus:bg-white dark:focus:bg-gray-800 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 {{ $errors->has('user_id') ? 'border-rose-500 ring-1 ring-rose-500' : '' }}" required>
                                        <option value="" disabled {{ old('user_id') ? '' : 'selected' }}>-- Select an Owner --</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                                @error('user_id') 
                                    <p class="text-rose-500 text-sm mt-2 flex items-center font-medium animate-pulse"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>{{ $message }}</p> 
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-10 pt-6 border-t border-gray-100 dark:border-gray-700/50">
                            <a href="{{ route('product.index') }}" class="mr-4 inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-xl text-sm font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-all shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-8 py-3 rounded-xl shadow-lg shadow-indigo-500/30 font-semibold text-white bg-gradient-to-r from-indigo-600 to-cyan-500 hover:from-indigo-500 hover:to-cyan-400 transform hover:-translate-y-1 transition-all duration-300 hover:shadow-indigo-500/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Create Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
