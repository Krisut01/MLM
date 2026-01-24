<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 tracking-tight">
                    {{ $package->name }} Package
                </h2>
                <p class="mt-2 text-gray-600">
                    Complete investment package with binary compensation and farming rewards
                </p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('packages') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50:bg-gray-700 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Packages
                </a>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Active Package
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Package Hero Section -->
            <div class="bg-gradient-to-r from-emerald-500 via-blue-500 to-purple-600 rounded-3xl p-8 lg:p-12 mb-8 text-white relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                                <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#grid)" />
                    </svg>
                </div>

                <div class="relative z-10">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <h1 class="text-4xl lg:text-6xl font-black mb-6">
                                {{ $package->name }}
                                <span class="block text-3xl lg:text-4xl font-bold opacity-90">Investment Package</span>
                            </h1>
                            <p class="text-xl mb-8 opacity-90 leading-relaxed">
                                Start your journey in our binary compensation ecosystem with guaranteed farming rewards and unlimited earning potential.
                            </p>

                            <div class="flex flex-wrap gap-4">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl px-4 py-3">
                                    <div class="text-2xl font-bold">{{ $package->points }}</div>
                                    <div class="text-sm opacity-90">Binary Points</div>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl px-4 py-3">
                                    <div class="text-2xl font-bold">{{ $package->max_daily_pairs }}</div>
                                    <div class="text-sm opacity-90">Daily Pairs</div>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl px-4 py-3">
                                    <div class="text-2xl font-bold">${{ number_format($package->pairing_bonus, 0) }}</div>
                                    <div class="text-sm opacity-90">Bonus Rate</div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center lg:text-right">
                            <div class="inline-block">
                                <div class="text-6xl lg:text-8xl font-black mb-4">
                                    ${{ number_format($package->price, 0) }}
                                </div>
                                <div class="text-xl opacity-90 mb-6">One-time Investment</div>

                                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 inline-block">
                                    <div class="text-lg mb-2">Potential Returns</div>
                                    <div class="text-3xl font-bold text-yellow-300">
                                        ${{ number_format($package->price * 3, 0) }}
                                    </div>
                                    <div class="text-sm opacity-90">Maximum 3X ROI</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Package Details -->
                <div class="lg:col-span-2 space-y-8">

                    <!-- Key Features -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            What You Get
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">Binary Compensation</h4>
                                        <p class="text-gray-600 text-sm">Access to our dual-leg matching system with daily pairing bonuses</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">Daily Farming Rewards</h4>
                                        <p class="text-gray-600 text-sm">0.50% daily returns for up to 500 days with guaranteed 3X maximum ROI</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">Network Building</h4>
                                        <p class="text-gray-600 text-sm">Leadership bonuses and car club qualifications for top performers</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">VIP Rewards</h4>
                                        <p class="text-gray-600 text-sm">Star qualifications, car rewards, and house & lot incentives</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">Blockchain Security</h4>
                                        <p class="text-gray-600 text-sm">Immutable transaction records and decentralized verification</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="w-10 h-10 bg-pink-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">Community Support</h4>
                                        <p class="text-gray-600 text-sm">24/7 support and educational resources for success</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Technical Specifications -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            Technical Specifications
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                    <span class="text-gray-600 font-medium">Binary Points</span>
                                    <span class="text-2xl font-bold text-blue-600">{{ $package->points }}</span>
                                </div>

                                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                    <span class="text-gray-600 font-medium">Daily Pair Limit</span>
                                    <span class="text-2xl font-bold text-purple-600">{{ $package->max_daily_pairs }}</span>
                                </div>

                                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                    <span class="text-gray-600 font-medium">Pairing Bonus Rate</span>
                                    <span class="text-2xl font-bold text-emerald-600">${{ number_format($package->pairing_bonus, 2) }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-medium">Royalty Bonus</span>
                                    <span class="text-2xl font-bold text-purple-600">${{ number_format($package->royalty_bonus ?? 0, 2) }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-medium">Buy Basket (Digital)</span>
                                    <span class="text-lg font-semibold text-blue-600">
                                        {{ $package->buy_basket_percent }}% / ${{ number_format($package->buy_basket_cost, 2) }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-medium">Basket Capacity</span>
                                    <span class="text-lg font-semibold text-gray-900">{{ number_format($package->basket_capacity) }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-medium">Harvest Multiplier</span>
                                    <span class="text-lg font-semibold text-emerald-600">x{{ number_format($package->harvest_multiplier, 1) }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-medium">Farming Load</span>
                                    <span class="text-lg font-semibold text-amber-600">${{ number_format($package->farming_load_amount, 2) }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-medium">LeafX Tokens Loaded</span>
                                    <span class="text-lg font-semibold text-indigo-600">
                                        {{ number_format($package->leafx_tokens_loaded, 2) }} (at ${{ number_format($package->leafx_token_value, 2) }} each)
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                    <span class="text-gray-600 font-medium">Farming Rate</span>
                                    <span class="text-2xl font-bold text-orange-600">0.50%</span>
                                </div>

                                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                    <span class="text-gray-600 font-medium">Farming Duration</span>
                                    <span class="text-2xl font-bold text-indigo-600">500 Days</span>
                                </div>

                                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                    <span class="text-gray-600 font-medium">Maximum ROI</span>
                                    <span class="text-2xl font-bold text-red-600">300%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Inclusions -->
                    @if($package->products->count() > 0)
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            🌿 Included Flower Tea Products
                        </h3>

                        <div class="mb-6 p-4 bg-gradient-to-r from-emerald-50 to-blue-50 rounded-xl border border-emerald-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm text-gray-600 mb-1">Total Included Products</div>
                                    <div class="text-3xl font-bold text-emerald-600">{{ $package->products->sum('pivot.quantity') }} Flower Teas</div>
                                </div>
                                <div class="text-5xl">📦</div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($package->products as $product)
                            <div class="flex items-start p-4 bg-gray-50 rounded-xl border border-gray-200">
                                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-emerald-100 to-blue-100 rounded-lg overflow-hidden mr-4">
                                    <img src="{{ $product->image_url }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between mb-1">
                                        <h4 class="font-semibold text-gray-900 text-sm line-clamp-1">
                                            {{ $product->name }}
                                        </h4>
                                        <span class="ml-2 px-2 py-0.5 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full flex-shrink-0">
                                            {{ $product->pivot->quantity }}x
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-2 line-clamp-1">
                                        {{ $product->category->icon }} {{ $product->category->name }}
                                    </p>
                                    <div class="text-xs text-emerald-600 font-medium">
                                        ${{ number_format($product->price, 2) }} ea
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-200">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <div class="text-sm text-gray-700">
                                    <strong>Note:</strong> All flower tea products are 100% organic and come with blockchain provenance tracking via QR code. Each product includes health benefits and is bundled with your package purchase.
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Earnings Projection -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-8 border border-blue-200">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            Earnings Projection Calculator
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600 mb-2">${{ number_format($package->price * 0.005, 2) }}</div>
                                <div class="text-sm text-gray-600">Daily Farming</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-emerald-600 mb-2">${{ number_format($package->price * 0.005 * 30, 2) }}</div>
                                <div class="text-sm text-gray-600">Monthly Average</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-purple-600 mb-2">${{ number_format($package->price * 3, 0) }}</div>
                                <div class="text-sm text-gray-600">3X Maximum</div>
                            </div>
                        </div>

                        <div class="bg-white/50 rounded-xl p-6">
                            <div class="text-sm text-gray-700 mb-4">
                                <strong>Note:</strong> Projections are estimates. Actual earnings depend on binary matching efficiency, leadership bonuses, and market conditions. All farming rewards are guaranteed up to the 3X maximum ROI cap.
                            </div>

                            <div class="flex items-center text-sm text-blue-600">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                Calculations based on optimal network performance
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Purchase Sidebar -->
                <div class="space-y-6">

                    <!-- Purchase Card -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 sticky top-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Secure Purchase</h3>

                        <!-- Price Display -->
                        <div class="text-center mb-8">
                            <div class="text-6xl font-black text-emerald-600 mb-2">
                                ${{ number_format($package->price, 2) }}
                            </div>
                            <div class="text-gray-600">One-time investment</div>
                        </div>

                        <!-- Payment Method -->
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-6 mb-6">
                            <div class="flex items-center justify-center mb-4">
                                <img src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt="USDT" class="w-8 h-8 mr-3">
                                <div class="text-center">
                                    <div class="font-semibold text-gray-900">USDT Payment</div>
                                    <div class="text-sm text-gray-600">TRC20 / ERC20 Networks</div>
                                </div>
                            </div>

                            <div class="text-center text-sm text-gray-600">
                                Secure blockchain payment with instant verification
                            </div>
                        </div>

                        <!-- Status Alert -->
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-6">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-medium text-green-800">Payment System Active</h4>
                                    <p class="text-sm text-green-700 mt-1">
                                        Secure blockchain payment integration is now active. Connect your MetaMask wallet to proceed with the purchase.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Requirements -->
                        <div class="space-y-3 mb-8">
                            <h4 class="font-semibold text-gray-900 mb-4">Requirements</h4>

                            <div class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">MetaMask or TokenPocket wallet</span>
                            </div>

                            <div class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Sufficient USDT balance</span>
                            </div>

                            <div class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Network fees (~$0.01-0.10)</span>
                            </div>
                        </div>

                        <!-- Test Connection Button -->
                        <button onclick="testWalletConnection()"
                                class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl text-base transition-all duration-300 mb-3 flex items-center justify-center border-2 border-blue-400 hover:border-blue-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Test Wallet Connection</span>
                        </button>

                        <!-- Purchase Button -->
                        <button onclick="connectWalletAndPay({{ $package->id }}, {{ $package->price }})"
                                id="payButton"
                                class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-xl text-lg transition-all duration-300 transform hover:scale-105 shadow-xl flex items-center justify-center mb-4 disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13l2.5-2.5m8.5 2.5l-2.5-2.5M9 21h6m-3-3v3"/>
                            </svg>
                            <span id="buttonText">Connect Wallet & Pay ${{ number_format($package->price, 2) }}</span>
                        </button>

                        @if (config('app.simulate_purchases'))
                            <button onclick="simulatePurchase({{ $package->id }})"
                                    class="w-full bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-semibold py-3 px-6 rounded-xl text-base transition-all duration-300 mb-4 flex items-center justify-center border border-purple-400/40">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span>Simulate Purchase (Dev)</span>
                            </button>
                            <p class="text-xs text-purple-600/90 -mt-2 mb-4 text-center">
                                Dev mode enabled: no real USDT is required. This will still create transactions, activate farming, and process commissions.
                            </p>
                        @endif

                        <!-- Terms -->
                        <div class="text-center">
                            <p class="text-xs text-gray-500">
                                By purchasing, you agree to our
                                <a href="#" class="text-blue-600 hover:underline">terms and conditions</a>.
                                <br>
                                All transactions are secured by blockchain technology.
                            </p>
                        </div>
                    </div>

                    <!-- Support Card -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 text-center">
                        <svg class="w-12 h-12 text-blue-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 100 19.5 9.75 9.75 0 000-19.5z"/>
                        </svg>
                        <h4 class="font-semibold text-gray-900 mb-2">Need Help?</h4>
                        <p class="text-sm text-gray-600 mb-4">
                            Our support team is here to help you get started
                        </p>
                        <a href="mailto:support@leafchain.com" class="inline-flex items-center text-blue-600 hover:text-blue-800:text-blue-300 font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let userWallet = null;
        let web3 = null;
        const simulatePurchasesEnabled = {{ config('app.simulate_purchases') ? 'true' : 'false' }};

        // Initialize Web3 and check for MetaMask
        async function initWeb3() {
            if (typeof window.ethereum !== 'undefined') {
                web3 = new Web3(window.ethereum);
                return true;
            } else {
                showNotification('MetaMask not detected. Please install MetaMask to proceed.', 'error');
                return false;
            }
        }

        // Test wallet connection (no payment)
        async function testWalletConnection() {
            const button = event.target.closest('button');
            const originalText = button.innerHTML;

            try {
                // Show loading state
                button.innerHTML = `
                    <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Connecting...</span>
                `;
                button.disabled = true;

                // Initialize Web3
                const web3Initialized = await initWeb3();
                if (!web3Initialized) return;

                // Connect wallet
                const walletAddress = await connectWallet();
                if (!walletAddress) return;

                // Get network info
                const networkId = await web3.eth.net.getId();
                const networkName = getNetworkName(networkId);

                // Get wallet balance
                const balance = await web3.eth.getBalance(walletAddress);
                const balanceEth = web3.utils.fromWei(balance, 'ether');

                // Show success message
                showNotification(`✅ Wallet Connected Successfully!\nAddress: ${walletAddress.slice(0, 6)}...${walletAddress.slice(-4)}\nNetwork: ${networkName}\nBalance: ${parseFloat(balanceEth).toFixed(4)} ETH`, 'success');

                // Update button to show success
                button.innerHTML = `
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-green-300">Connection Successful!</span>
                `;

                // Reset after 3 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.disabled = false;
                }, 3000);

            } catch (error) {
                console.error('Connection test failed:', error);
                showNotification('Connection test failed. Please try again.', 'error');

                // Reset button
                button.innerHTML = originalText;
                button.disabled = false;
            }
        }

        // Connect wallet
        async function connectWallet() {
            try {
                const accounts = await window.ethereum.request({ method: 'eth_requestAccounts' });
                userWallet = accounts[0];
                return userWallet;
            } catch (error) {
                console.error('Wallet connection failed:', error);
                showNotification('Failed to connect wallet. Please try again.', 'error');
                return null;
            }
        }

        // 🌿 LEAFCHAIN NETWORK CONFIGURATIONS
        // 🔧 UPDATE THESE ADDRESSES FOR PRODUCTION DEPLOYMENT
        const networkConfig = {
            // 🧪 LOCAL DEVELOPMENT (Hardhat)
            31337: {
                usdtContract: '{{ config("app.local_usdt_contract", "DEPLOY_YOUR_CONTRACT") }}',
                companyWallet: '{{ config("app.company_wallet", "YOUR_WALLET_ADDRESS") }}',
                name: 'Localhost 8545 (Development)',
                rpcUrl: 'http://127.0.0.1:8545/',
                chainId: '0x7A69'
            },
            // 🧪 POLYGON MUMBAI TESTNET (Deprecated - use Amoy)
            80001: {
                usdtContract: '0x3813e82e6f7098b9583FC0F3314f7c8d0bff3BDDB',
                companyWallet: '{{ config("app.company_wallet", "0x1E634ce86b9dC049C022E26441eF21026061e3A3") }}',
                name: 'Polygon Mumbai Testnet',
                rpcUrl: 'https://rpc-mumbai.maticvigil.com/',
                chainId: '0x13881'
            },
            // 🧪 POLYGON AMOY TESTNET (Current Testnet - Recommended)
            80002: {
                usdtContract: '{{ config("app.amoy_usdt_contract", "DEPLOY_USDT_CONTRACT_ON_AMOY") }}',
                companyWallet: '{{ config("app.company_wallet", "0x1E634ce86b9dC049C022E26441eF21026061e3A3") }}',
                name: 'Polygon Amoy Testnet',
                rpcUrl: 'https://rpc-amoy.polygon.technology/',
                chainId: '0x13882'
            },
            // 🟢 POLYGON MAINNET (Production)
            137: {
                usdtContract: '0xc2132D05D31c914a87C6611C10748AEb04B58e8F6',
                companyWallet: '{{ config("app.company_wallet", "UPDATE_FOR_PRODUCTION") }}',
                name: 'Polygon Mainnet',
                rpcUrl: 'https://polygon-rpc.com/',
                chainId: '0x89'
            },
            // 🧪 ETHEREUM SEPOLIA TESTNET
            11155111: {
                usdtContract: '0x7169D38820dfd117C3FA1f22a697dBA58d90BA06',
                companyWallet: '{{ config("app.company_wallet", "0x1E634ce86b9dC049C022E26441eF21026061e3A3") }}',
                name: 'Ethereum Sepolia Testnet',
                rpcUrl: 'https://sepolia.infura.io/v3/YOUR_INFURA_KEY',
                chainId: '0xaa36a7'
            },
            // 🟢 ETHEREUM MAINNET (Production)
            1: {
                usdtContract: '0xdAC17F958D2ee523a2206206994597C13D831ec7',
                companyWallet: '{{ config("app.company_wallet", "UPDATE_FOR_PRODUCTION") }}',
                name: 'Ethereum Mainnet',
                rpcUrl: 'https://mainnet.infura.io/v3/YOUR_INFURA_KEY',
                chainId: '0x1'
            }
        };

        // 🌐 CURRENT NETWORK SELECTION
        // Change this to switch between networks
        const CURRENT_NETWORK = '{{ config("app.blockchain_network", "amoy") }}';
        const TARGET_CHAIN_ID = CURRENT_NETWORK === 'local' ? '0x7A69' :
                               CURRENT_NETWORK === 'mumbai' ? '0x13881' :
                               CURRENT_NETWORK === 'amoy' ? '0x13882' :
                               CURRENT_NETWORK === 'polygon' ? '0x89' :
                               CURRENT_NETWORK === 'sepolia' ? '0xaa36a7' : '0x1';

        // Switch to Polygon Mumbai testnet
        async function switchToPolygonMumbai() {
            try {
                await window.ethereum.request({
                    method: 'wallet_switchEthereumChain',
                    params: [{ chainId: '0x13881' }],
                });
                return true;
            } catch (switchError) {
                if (switchError.code === 4902) {
                    try {
                        await window.ethereum.request({
                            method: 'wallet_addEthereumChain',
                            params: [{
                                chainId: '0x13881',
                                chainName: 'Polygon Mumbai Testnet',
                                nativeCurrency: {
                                    name: 'MATIC',
                                    symbol: 'MATIC',
                                    decimals: 18
                                },
                                rpcUrls: ['https://rpc-mumbai.maticvigil.com/'],
                                blockExplorerUrls: ['https://mumbai.polygonscan.com/']
                            }],
                        });
                        return true;
                    } catch (addError) {
                        console.error('Failed to add Polygon Mumbai network:', addError);
                        return false;
                    }
                }
                console.error('Failed to switch to Polygon Mumbai:', switchError);
                return false;
            }
        }

        // Switch to Polygon Amoy testnet (Current Recommended Testnet)
        async function switchToPolygonAmoy() {
            try {
                await window.ethereum.request({
                    method: 'wallet_switchEthereumChain',
                    params: [{ chainId: '0x13882' }],
                });
                return true;
            } catch (switchError) {
                if (switchError.code === 4902) {
                    try {
                        await window.ethereum.request({
                            method: 'wallet_addEthereumChain',
                            params: [{
                                chainId: '0x13882',
                                chainName: 'Polygon Amoy Testnet',
                                nativeCurrency: {
                                    name: 'POL',
                                    symbol: 'POL',
                                    decimals: 18
                                },
                                rpcUrls: ['https://rpc-amoy.polygon.technology/'],
                                blockExplorerUrls: ['https://amoy.polygonscan.com/']
                            }],
                        });
                        return true;
                    } catch (addError) {
                        console.error('Failed to add Polygon Amoy network:', addError);
                        return false;
                    }
                }
                console.error('Failed to switch to Polygon Amoy:', switchError);
                return false;
            }
        }

        // Get current network configuration
        async function getCurrentNetworkConfig() {
            try {
                const networkId = await web3.eth.net.getId();
                return networkConfig[networkId] || null;
            } catch (error) {
                console.error('Failed to get network config:', error);
                return null;
            }
        }

        // Check USDT balance
        async function checkUSDTBalance(walletAddress) {
            try {
                const config = await getCurrentNetworkConfig();
                if (!config) {
                    throw new Error('Unsupported network. Please switch to Polygon Mumbai or Ethereum Sepolia testnet.');
                }

                const usdtContractAddress = config.usdtContract;

                // Minimal ABI for balanceOf function
                const minABI = [
                    {
                        "constant": true,
                        "inputs": [{"name": "_owner", "type": "address"}],
                        "name": "balanceOf",
                        "outputs": [{"name": "balance", "type": "uint256"}],
                        "type": "function"
                    }
                ];

                const contract = new web3.eth.Contract(minABI, usdtContractAddress);
                const balance = await contract.methods.balanceOf(walletAddress).call();
                return web3.utils.fromWei(balance, 'mwei'); // USDT has 6 decimals
            } catch (error) {
                console.error('Balance check failed:', error);
                showNotification('Failed to check USDT balance. Please ensure you are on a supported network.', 'error');
                return 0;
            }
        }

        // Send USDT payment
        async function sendUSDTPayment(toAddress, amount) {
            try {
                const config = await getCurrentNetworkConfig();
                if (!config) {
                    throw new Error('Unsupported network. Please switch to Polygon Mumbai or Ethereum Sepolia testnet.');
                }

                const usdtContractAddress = config.usdtContract;
                const companyWallet = config.companyWallet;

                const usdtABI = [
                    {
                        "constant": false,
                        "inputs": [
                            {"name": "_to", "type": "address"},
                            {"name": "_value", "type": "uint256"}
                        ],
                        "name": "transfer",
                        "outputs": [{"name": "", "type": "bool"}],
                        "type": "function"
                    }
                ];

                const contract = new web3.eth.Contract(usdtABI, usdtContractAddress);
                const amountInWei = web3.utils.toWei(amount.toString(), 'mwei'); // USDT has 6 decimals

                const tx = await contract.methods.transfer(toAddress, amountInWei).send({
                    from: userWallet,
                    gas: 100000
                });

                return tx.transactionHash;
            } catch (error) {
                console.error('Payment failed:', error);
                throw error;
            }
        }

        // Main payment function
        async function connectWalletAndPay(packageId, packagePrice) {
            const button = document.getElementById('payButton');
            const buttonText = document.getElementById('buttonText');

            try {
                // Disable button and show loading
                button.disabled = true;
                buttonText.textContent = 'Connecting...';

                // Initialize Web3
                const web3Initialized = await initWeb3();
                if (!web3Initialized) return;

                // Check network and switch if needed
                buttonText.textContent = 'Checking Network...';
                const config = await getCurrentNetworkConfig();
                if (!config) {
                    showNotification('Switching to Polygon Mumbai testnet...', 'info');
                    const switched = await switchToPolygonMumbai();
                    if (!switched) {
                        showNotification('Please manually switch to Polygon Mumbai testnet in MetaMask.', 'error');
                        return;
                    }
                    // Wait for network switch
                    await new Promise(resolve => setTimeout(resolve, 2000));
                }

                // Connect wallet
                buttonText.textContent = 'Connecting Wallet...';
                const wallet = await connectWallet();
                if (!wallet) return;

                // Check balance
                buttonText.textContent = 'Checking Balance...';
                const balance = await checkUSDTBalance(wallet);

                if (parseFloat(balance) < packagePrice) {
                    showNotification(`Insufficient USDT balance. You have ${balance} USDT, but need ${packagePrice} USDT.`, 'error');
                    return;
                }

                // Confirm payment
                const confirmed = confirm(`Pay ${packagePrice} USDT for this package? Your balance: ${balance} USDT`);
                if (!confirmed) {
                    button.disabled = false;
                    buttonText.textContent = `Connect Wallet & Pay $${packagePrice}`;
                    return;
                }

                // Process payment
                buttonText.textContent = 'Processing Payment...';

                const txHash = await sendUSDTPayment(companyWallet, packagePrice);

                // Verify payment on backend
                buttonText.textContent = 'Verifying Payment...';
                const response = await fetch('/packages/purchase', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        package_id: packageId,
                        tx_hash: txHash,
                        wallet_address: userWallet
                    })
                });

                const result = await response.json();

                if (result.success) {
                    // Show QR code success modal
                    showQRSuccessModal(result.data);
                    showNotification('Payment successful! Your package has been activated.', 'success');
                    buttonText.textContent = 'Payment Successful!';
                    // Don't redirect immediately - let user see QR code
                    setTimeout(() => {
                        window.location.href = '/dashboard';
                    }, 10000); // Give 10 seconds to see QR code
                } else {
                    showNotification('Payment verification failed. Please contact support.', 'error');
                }

            } catch (error) {
                console.error('Payment process failed:', error);
                showNotification('Payment failed. Please try again.', 'error');
                button.disabled = false;
                buttonText.textContent = `Connect Wallet & Pay $${packagePrice}`;
            }
        }

        async function simulatePurchase(packageId) {
            if (!simulatePurchasesEnabled) {
                showNotification('Simulation is disabled. Set APP_SIMULATE_PURCHASES=true in .env', 'error');
                return;
            }

            try {
                const confirmed = confirm('Simulate this package purchase? This will activate farming, binary placement, and commissions without real USDT.');
                if (!confirmed) return;

                const response = await fetch('{{ route('packages.simulate.purchase') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ package_id: packageId }),
                });

                const result = await response.json();
                if (!response.ok || !result.success) {
                    showNotification(result.message || 'Simulation failed.', 'error');
                    return;
                }

                showNotification(`✅ Simulated purchase completed!\nPackage: ${result.data.package}\nBatch: ${result.data.batch_id}`, 'success');
                showQRSuccessModal(result.data);
                setTimeout(() => {
                    window.location.href = '/dashboard';
                }, 5000);
            } catch (e) {
                console.error(e);
                showNotification('Simulation failed due to a network error.', 'error');
            }
        }

        // Get network name from chain ID
        function getNetworkName(networkId) {
            const networks = {
                1: 'Ethereum Mainnet',
                5: 'Ethereum Goerli (Testnet)',
                11155111: 'Ethereum Sepolia (Testnet)',
                137: 'Polygon Mainnet',
                80001: 'Polygon Mumbai (Testnet)',
                80002: 'Polygon Amoy (Testnet)',
                56: 'BSC Mainnet',
                97: 'BSC Testnet',
                43114: 'Avalanche Mainnet',
                43113: 'Avalanche Fuji (Testnet)'
            };
            return networks[networkId] || `Unknown Network (${networkId})`;
        }

        // QR Success Modal
        function showQRSuccessModal(data) {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 z-50 overflow-y-auto';
            modal.innerHTML = `
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left flex-1">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        🎉 Payment Successful!
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Your purchase has been verified on the blockchain. Here's your batch verification QR code:
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <div id="qrCodeContainer" class="text-center">
                                                <!-- QR Code will be generated here -->
                                                <div class="animate-pulse">
                                                    <div class="h-48 w-48 bg-gray-300 rounded mx-auto"></div>
                                                    <p class="mt-2 text-sm text-gray-500">Generating QR Code...</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 text-sm text-gray-600">
                                            <p><strong>Batch ID:</strong> <span id="batchId">${data.batch_id}</span></p>
                                            <p class="mt-1">Keep this QR code as proof of your authentic LeafChain purchase.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <a href="${data.verification_url}"
                               target="_blank"
                               class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                View Verification Page
                            </a>
                            <button type="button"
                                    onclick="this.closest('.fixed').remove()"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            `;

            document.body.appendChild(modal);

            // Generate QR code after modal is shown
            setTimeout(() => {
                generateQRCodeForModal(data);
            }, 500);
        }

        // Generate QR code for the modal
        async function generateQRCodeForModal(data) {
            try {
                // QR code data
                const qrData = {
                    batchId: data.batch_id,
                    packageType: data.package,
                    purchaseId: data.transaction_id,
                    verificationUrl: data.verification_url,
                    timestamp: new Date().toISOString()
                };

                // Use qrcode library (assuming it's loaded)
                if (typeof QRCode !== 'undefined') {
                    const qrContainer = document.getElementById('qrCodeContainer');
                    qrContainer.innerHTML = ''; // Clear loading

                    // Generate QR code
                    new QRCode(qrContainer, {
                        text: JSON.stringify(qrData),
                        width: 192,
                        height: 192,
                        colorDark: "#000000",
                        colorLight: "#ffffff",
                        correctLevel: QRCode.CorrectLevel.H
                    });

                    // Add download button
                    const downloadBtn = document.createElement('a');
                    downloadBtn.href = data.verification_url + '/download';
                    downloadBtn.className = 'mt-3 inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200:bg-blue-800';
                    downloadBtn.innerHTML = 'Download QR Code';
                    qrContainer.appendChild(downloadBtn);
                } else {
                    // Fallback if QRCode library not loaded
                    document.getElementById('qrCodeContainer').innerHTML = `
                        <div class="text-center p-4">
                            <p class="text-sm text-gray-600 mb-2">QR Code Generated Successfully!</p>
                            <p class="text-xs text-gray-500">Visit the verification page to see your QR code.</p>
                            <a href="${data.verification_url}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm">View Verification Page →</a>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('QR code generation failed:', error);
                document.getElementById('qrCodeContainer').innerHTML = `
                    <div class="text-center p-4">
                        <p class="text-sm text-red-600">QR Code generation failed</p>
                        <p class="text-xs text-gray-500">But your purchase was successful!</p>
                        <a href="${data.verification_url}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm">View Verification Page →</a>
                    </div>
                `;
            }
        }

        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm ${getNotificationClasses(type)}`;
            notification.innerHTML = `
                <div class="flex items-center">
                    <div class="flex-1">${message}</div>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-current opacity-70 hover:opacity-100">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 5000);
        }

        function getNotificationClasses(type) {
            const baseClasses = 'text-white font-medium';
            switch (type) {
                case 'success':
                    return baseClasses + ' bg-green-500';
                case 'error':
                    return baseClasses + ' bg-red-500';
                case 'warning':
                    return baseClasses + ' bg-yellow-500';
                default:
                    return baseClasses + ' bg-blue-500';
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Add CSRF token meta tag if not present
            if (!document.querySelector('meta[name="csrf-token"]')) {
                const meta = document.createElement('meta');
                meta.name = 'csrf-token';
                meta.content = '{{ csrf_token() }}';
                document.head.appendChild(meta);
            }
        });
    </script>

    <!-- Load Web3.js -->
    <script src="https://cdn.jsdelivr.net/npm/web3@1.8.0/dist/web3.min.js"></script>

    <!-- Load QRCode.js -->
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
</x-app-layout>
