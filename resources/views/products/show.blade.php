<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-900 dark:text-white tracking-tight">
                {{ $product->name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Product Detail Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                
                <!-- Product Image -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
                    <div class="relative h-96 bg-gradient-to-br from-emerald-50 to-blue-50 dark:from-emerald-900/20 dark:to-blue-900/20">
                        <img src="{{ $product->image_url }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-semibold bg-white/90 dark:bg-gray-800/90 text-emerald-600">
                                {{ $product->category->icon }} {{ $product->category->name }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Product Metadata -->
                    @if($product->metadata)
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Product Details</h4>
                            <div class="grid grid-cols-3 gap-4 text-center">
                                @if(isset($product->metadata['weight']))
                                    <div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">Weight</div>
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->metadata['weight'] }}</div>
                                    </div>
                                @endif
                                @if(isset($product->metadata['serving_size']))
                                    <div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">Serving</div>
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->metadata['serving_size'] }}</div>
                                    </div>
                                @endif
                                @if(isset($product->metadata['brew_time']))
                                    <div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">Brew Time</div>
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->metadata['brew_time'] }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <!-- Title & Price -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ $product->name }}
                        </h1>
                        
                        <div class="flex items-baseline gap-2 mb-6">
                            <span class="text-4xl font-black text-emerald-600">${{ number_format($product->price, 2) }}</span>
                            <span class="text-lg text-gray-500 dark:text-gray-400">USDT</span>
                        </div>

                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                            {{ $product->description }}
                        </p>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button class="w-full px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition-colors">
                                🛒 Add to Cart (Coming Soon)
                            </button>
                            
                            @if($product->packages->count() > 0)
                                <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                                    This product is included in 
                                    @foreach($product->packages as $index => $package)
                                        <a href="{{ route('packages.show', $package->id) }}" class="text-emerald-600 hover:underline font-semibold">
                                            {{ $package->name }} Package</a>@if(!$loop->last), @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Blockchain Verification -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl p-6 border border-blue-200 dark:border-blue-800">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Blockchain Verified</h4>
                                <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">
                                    Every batch comes with a unique QR code for provenance tracking on Polygon blockchain.
                                </p>
                                <div class="inline-flex items-center px-3 py-1 bg-white dark:bg-gray-800 rounded-lg text-xs font-medium text-blue-600">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z"/>
                                        <path d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z"/>
                                    </svg>
                                    Scan QR Code to Verify
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Health Benefits Section -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 mb-12">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-3">
                    <span class="flex items-center justify-center w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </span>
                    Health Benefits
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach(explode('•', $product->health_benefits) as $benefit)
                        @if(trim($benefit))
                            <div class="flex items-start gap-3 p-4 bg-emerald-50 dark:bg-emerald-900/20 rounded-lg">
                                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{ trim($benefit) }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Related Products -->
            @if($relatedProducts->count() > 0)
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">You May Also Like</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedProducts as $related)
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden group">
                                <div class="relative h-40 bg-gradient-to-br from-emerald-50 to-blue-50 dark:from-emerald-900/20 dark:to-blue-900/20">
                                    <img src="{{ $related->image_url }}" 
                                         alt="{{ $related->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                </div>
                                <div class="p-4">
                                    <h4 class="text-base font-bold text-gray-900 dark:text-white mb-2 line-clamp-1">
                                        {{ $related->name }}
                                    </h4>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xl font-black text-emerald-600">${{ number_format($related->price, 2) }}</span>
                                        <a href="{{ route('products.show', $related->slug) }}" 
                                           class="text-sm text-emerald-600 hover:text-emerald-700 font-semibold">
                                            View →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
