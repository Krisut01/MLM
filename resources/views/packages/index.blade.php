<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-bold text-2xl text-gray-900 tracking-tight">
                Investment Packages
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800 self-start sm:self-center">
                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                4 Packages Available
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 tracking-tight leading-tight">
                    Choose Your
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-blue-600 block sm:inline">
                        Investment Package
                    </span>
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-base sm:text-lg text-gray-600 leading-relaxed">
                    Start your journey in our binary compensation ecosystem. Each package offers unique earning potential through referrals, matching bonuses, and farming rewards.
                </p>
            </div>

            <!-- Key Benefits -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Daily Returns</h3>
                    <p class="text-sm text-gray-600">0.50% daily farming rewards</p>
                </div>

                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Binary System</h3>
                    <p class="text-sm text-gray-600">Left/Right leg matching bonuses</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">300% ROI Cap</h3>
                    <p class="text-sm text-gray-600">Guaranteed 3X return on investment</p>
                </div>

                <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Verified Assets</h3>
                    <p class="text-sm text-gray-600">Real flower tea backed tokens</p>
                </div>
            </div>

            <!-- Package Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-16">
                @foreach($packages as $index => $package)
                <div class="relative group">
                    <!-- Popular Badge for Gold Package -->
                    @if($package->name === 'Gold')
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 z-10">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-gradient-to-r from-yellow-400 to-orange-500 text-white shadow-lg">
                            <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                            </svg>
                            Most Popular
                        </span>
                    </div>
                    @endif

                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-200 overflow-hidden h-full flex flex-col">
                        <!-- Header -->
                        <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 p-6 text-white">
                            <div class="text-center">
                                <h3 class="text-xl font-bold mb-2">{{ $package->name }} Package</h3>
                                <div class="text-4xl font-black">${{ number_format($package->price, 0) }}</div>
                                <div class="text-emerald-100 text-sm mt-1">One-time investment</div>
                            </div>
                        </div>

                        <!-- Features -->
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="space-y-4 mb-8 flex-1">
                                <div class="flex items-center justify-between py-3 border-b border-gray-100">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium">Binary Points</span>
                                    </div>
                                    <span class="font-bold text-gray-900">{{ $package->points }}</span>
                                </div>

                                <div class="flex items-center justify-between py-3 border-b border-gray-100">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium">Daily Pairs Limit</span>
                                    </div>
                                    <span class="font-bold text-gray-900">{{ $package->max_daily_pairs }}</span>
                                </div>

                                <div class="flex items-center justify-between py-3 border-b border-gray-100">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium">Pairing Bonus</span>
                                    </div>
                                    <span class="font-bold text-emerald-600">${{ number_format($package->pairing_bonus, 2) }}</span>
                                </div>

                                <!-- Product Inclusions -->
                                @if($package->products->count() > 0)
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <div class="flex items-center mb-3">
                                        <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium">Includes {{ $package->products->sum('pivot.quantity') }} Flower Teas</span>
                                    </div>
                                    <div class="text-xs text-gray-500 line-clamp-2">
                                        @foreach($package->products->take(3) as $index => $product)
                                            {{ $product->pivot->quantity }}x {{ $product->name }}@if(!$loop->last), @endif
                                        @endforeach
                                        @if($package->products->count() > 3)
                                            + {{ $package->products->count() - 3 }} more
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3 mt-auto">
                                <a href="{{ route('packages.show', $package) }}"
                                   class="block w-full bg-gray-100 hover:bg-gray-200:bg-gray-600 text-gray-900 font-semibold py-3 px-4 rounded-xl transition-colors duration-200 text-center">
                                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    View Details
                                </a>

                                <a href="{{ route('packages.show', $package) }}"
                                   class="block w-full bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200 shadow-lg text-center">
                                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13l2.5-2.5m8.5 2.5l-2.5-2.5M9 21h6m-3-3v3"/>
                                    </svg>
                                    Get Started Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- How It Works Section -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-3xl p-8 lg:p-12">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">How It Works</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Start your investment journey in 3 simple steps
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center group">
                        <div class="relative mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                <span class="text-2xl font-bold text-white">1</span>
                            </div>
                            <div class="hidden md:block absolute top-10 left-1/2 w-full h-0.5 bg-gradient-to-r from-blue-500 to-transparent transform translate-x-10"></div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Choose Your Package</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Select the investment package that matches your financial goals and risk tolerance.
                        </p>
                    </div>

                    <div class="text-center group">
                        <div class="relative mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                <span class="text-2xl font-bold text-white">2</span>
                            </div>
                            <div class="hidden md:block absolute top-10 left-1/2 w-full h-0.5 bg-gradient-to-r from-emerald-500 to-transparent transform translate-x-10"></div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Make Secure Payment</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Connect your MetaMask wallet and complete payment with USDT for instant verification.
                        </p>
                    </div>

                    <div class="text-center group">
                        <div class="relative mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                <span class="text-2xl font-bold text-white">3</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Start Earning</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Join the binary network and begin earning through referrals, matching bonuses, and farming rewards.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="mt-16">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">What is the binary compensation system?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Our binary system rewards you for building two legs (left and right) of your network. When both legs have equal points, you earn matching bonuses.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">How does farming work?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Farming provides 0.50% daily returns on your investment for up to 500 days, with a maximum 300% ROI cap for guaranteed growth.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Are there any risks?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            While rewards are guaranteed up to the 3X cap, market conditions may affect token value. All investments carry some level of risk.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">When can I withdraw earnings?</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Minimum withdrawal is $20 with a 5% processing fee. Withdrawals are available 24/7 once farming rewards are credited.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
