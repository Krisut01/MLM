<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <h2 class="font-bold text-2xl text-gray-900 dark:text-white tracking-tight">
                    {{ $category->icon }} {{ $category->name }}
                </h2>
            </div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200 self-start sm:self-center">
                {{ $products->total() }} Products
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Category Description -->
            @if($category->description)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-8">
                    <p class="text-center text-gray-700 dark:text-gray-300 text-lg">
                        {{ $category->description }}
                    </p>
                </div>
            @endif

            <!-- Category Filter Tabs -->
            <div class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">All Categories:</span>
                    <a href="{{ route('products.index') }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-colors bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-gray-600">
                        All Products
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('products.category', $cat->slug) }}" 
                           class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $cat->id === $category->id ? 'bg-emerald-600 text-white' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-gray-600' }}">
                            {{ $cat->icon }} {{ $cat->name }} ({{ $cat->products_count }})
                        </a>
                    @endforeach
                </div>
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
                                        {{ $category->icon }}
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
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No products in this category yet</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Check back soon for new additions</p>
                    <a href="{{ route('products.index') }}" class="text-emerald-600 hover:text-emerald-700 font-semibold">
                        Browse All Products →
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
