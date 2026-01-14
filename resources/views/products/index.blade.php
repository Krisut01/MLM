<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-bold text-2xl text-gray-900 dark:text-white tracking-tight">
                🌿 Flower Tea Marketplace
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200 self-start sm:self-center">
                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ $products->total() }} Products Available
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white tracking-tight leading-tight">
                    Discover Our
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-blue-600 block sm:inline">
                        Organic Flower Teas
                    </span>
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-base sm:text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                    100% pure, organic flower teas with traceable blockchain provenance. Each product comes with a unique QR code for verification.
                </p>
            </div>

            <!-- Category Filter -->
            <div class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Categories:</span>
                    <a href="{{ route('products.index') }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ !request('category') ? 'bg-emerald-600 text-white' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-gray-600' }}">
                        All Products
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('products.index', ['category' => $category->slug]) }}" 
                           class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('category') === $category->slug ? 'bg-emerald-600 text-white' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-gray-600' }}">
                            {{ $category->icon }} {{ $category->name }} ({{ $category->products_count }})
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Search & Sort -->
            <div class="mb-8 flex flex-col sm:flex-row gap-4">
                <form action="{{ route('products.search') }}" method="GET" class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="q" 
                               value="{{ request('search') }}" 
                               placeholder="Search products..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white">
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </form>
                <select onchange="window.location.href='{{ route('products.index') }}?sort=' + this.value{{ request('category') ? '&category=' . request('category') : '' }}'" 
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Sort By</option>
                    <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </div>

            <!-- Products Grid -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
                    @foreach($products as $product)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden group">
                            <!-- Product Image -->
                            <div class="relative h-48 bg-gradient-to-br from-emerald-50 to-blue-50 dark:from-emerald-900/20 dark:to-blue-900/20 overflow-hidden">
                                <img src="{{ $product->image_url }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                <div class="absolute top-3 right-3">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-white/90 dark:bg-gray-800/90 text-emerald-600">
                                        {{ $product->category->icon }} {{ $product->category->name }}
                                    </span>
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-1">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-4 line-clamp-2">
                                    {{ $product->description }}
                                </p>
                                
                                <!-- Price -->
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <span class="text-2xl font-black text-emerald-600">${{ number_format($product->price, 2) }}</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">USDT</span>
                                    </div>
                                    @if($product->metadata && isset($product->metadata['weight']))
                                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $product->metadata['weight'] }}</span>
                                    @endif
                                </div>

                                <!-- Action Button -->
                                <a href="{{ route('products.show', $product->slug) }}" 
                                   class="block w-full text-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition-colors">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No products found</h3>
                    <p class="text-gray-600 dark:text-gray-400">Try adjusting your search or filter criteria</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
