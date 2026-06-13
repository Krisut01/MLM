<x-guest-layout>
    <div class="min-h-screen bg-white text-gray-900">
        
        <!-- ============================================
             HEADER / NAVIGATION
        ============================================= -->
        <header class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    
                    <!-- Logo -->
                    <a href="{{ route('landing') }}" class="flex items-center gap-2">
                        <span class="text-2xl font-bold text-emerald-600">LeafChain</span>
                    </a>
                    
                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center gap-8">
                        <a href="#home" class="text-gray-600 hover:text-emerald-600 font-medium transition-colors">Home</a>
                        <a href="#about" class="text-gray-600 hover:text-emerald-600 font-medium transition-colors">About</a>
                        <a href="#products" class="text-gray-600 hover:text-emerald-600 font-medium transition-colors">Products</a>
                        <a href="#how-it-works" class="text-gray-600 hover:text-emerald-600 font-medium transition-colors">How It Works</a>
                        <a href="#testimonials" class="text-gray-600 hover:text-emerald-600 font-medium transition-colors">Testimonials</a>
                        <a href="#contact" class="text-gray-600 hover:text-emerald-600 font-medium transition-colors">Contact</a>
                    </div>
                    
                    <!-- Auth Buttons -->
                    <div class="flex items-center gap-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="px-5 py-2 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 transition-colors">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-600 hover:text-emerald-600 font-medium transition-colors">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-5 py-2 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 transition-colors">
                                        Get Started
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>
        </header>

        <!-- ============================================
             MAIN CONTENT
        ============================================= -->
        <main>
            
            <!-- ========================================
                 HERO SECTION
            ========================================= -->
            <section id="home" class="py-20 lg:py-28 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-emerald-50 to-white">
                <div class="max-w-4xl mx-auto text-center">
                    
                    <!-- Badge -->
                    <span class="inline-block px-4 py-1 bg-emerald-100 text-emerald-700 text-sm font-semibold rounded-full mb-6">
                        Blockchain-Verified Wellness
                    </span>
                    
                    <!-- Headline -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        {{ $settings->hero_title ?? 'Pure Wellness, Verified Trust' }}
                    </h1>
                    
                    <!-- Subheadline -->
                    <p class="mt-6 text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                        {{ $settings->hero_subtitle ?? 'Experience premium organic flower teas with blockchain-powered provenance. From seed to cup, every sip tells a verified story.' }}
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ $settings->cta_link ?? route('register') }}" class="px-8 py-4 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700 transition-colors shadow-lg">
                            {{ $settings->cta_text ?? 'Start Your Journey' }}
                        </a>
                        <a href="#products" class="px-8 py-4 bg-white text-gray-900 font-bold rounded-lg border-2 border-gray-200 hover:border-emerald-500 hover:bg-emerald-50 transition-colors">
                            Explore Products
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="mt-12 flex flex-wrap justify-center gap-8 text-sm text-gray-500">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>100% Organic</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Blockchain Verified</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span>Earn Rewards</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ========================================
                 ABOUT SECTION
            ========================================= -->
            <section id="about" class="py-20 px-4 sm:px-6 lg:px-8">
                <div class="max-w-6xl mx-auto">
                    
                    <!-- Section Header -->
                    <div class="text-center mb-16">
                        <span class="text-emerald-600 font-semibold text-sm uppercase tracking-wider">About Us</span>
                        <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">Why Choose LeafChain?</h2>
                        <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                            {{ $settings->rwa_body ?? 'We combine premium organic flower teas with blockchain technology for complete transparency and trust.' }}
                        </p>
                    </div>
                    
                    <!-- Features Grid -->
                    <div class="grid md:grid-cols-3 gap-8">
                        
                        <!-- Feature 1 -->
                        <div class="text-center p-8 bg-gray-50 rounded-2xl">
                            <div class="w-14 h-14 mx-auto bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Premium Quality</h3>
                            <p class="text-gray-600">100% organic flower teas sourced from certified farms with rigorous quality standards.</p>
                        </div>
                        
                        <!-- Feature 2 -->
                        <div class="text-center p-8 bg-gray-50 rounded-2xl">
                            <div class="w-14 h-14 mx-auto bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Blockchain Verified</h3>
                            <p class="text-gray-600">Every batch is tracked on blockchain for complete transparency from farm to cup.</p>
                        </div>
                        
                        <!-- Feature 3 -->
                        <div class="text-center p-8 bg-gray-50 rounded-2xl">
                            <div class="w-14 h-14 mx-auto bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Earn Rewards</h3>
                            <p class="text-gray-600">Participate in our referral program and earn commissions through our binary network.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ========================================
                 PRODUCTS SECTION
            ========================================= -->
            <section id="products" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
                <div class="max-w-6xl mx-auto">
                    
                    <!-- Section Header -->
                    <div class="text-center mb-16">
                        <span class="text-emerald-600 font-semibold text-sm uppercase tracking-wider">Our Collection</span>
                        <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">Premium Flower Teas</h2>
                        <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                            Each flower brings unique wellness benefits for a balanced, healthier lifestyle.
                        </p>
                    </div>
                    
                    <!-- Products Grid -->
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        <!-- Product 1 -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-emerald-300 hover:shadow-lg transition-all">
                            <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-2xl">🌹</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Rose Tea</h3>
                            <p class="mt-2 text-gray-600 text-sm">Soothe anxiety, reduce stress, and invigorate blood circulation.</p>
                            <div class="mt-4 flex gap-2">
                                <span class="px-2 py-1 bg-pink-50 text-pink-600 text-xs rounded">Beauty</span>
                                <span class="px-2 py-1 bg-purple-50 text-purple-600 text-xs rounded">Relaxation</span>
                            </div>
                        </div>
                        
                        <!-- Product 2 -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-emerald-300 hover:shadow-lg transition-all">
                            <div class="w-12 h-12 bg-white border border-gray-200 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-2xl">🌸</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Jasmine Tea</h3>
                            <p class="mt-2 text-gray-600 text-sm">Promotes glowing skin, improves gut health, and manages blood sugar.</p>
                            <div class="mt-4 flex gap-2">
                                <span class="px-2 py-1 bg-green-50 text-green-600 text-xs rounded">Skin Glow</span>
                                <span class="px-2 py-1 bg-blue-50 text-blue-600 text-xs rounded">Immunity</span>
                            </div>
                        </div>
                        
                        <!-- Product 3 -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-emerald-300 hover:shadow-lg transition-all">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-2xl">💜</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Lavender Tea</h3>
                            <p class="mt-2 text-gray-600 text-sm">Calm the mind, relax the body, and prepare for deep restful sleep.</p>
                            <div class="mt-4 flex gap-2">
                                <span class="px-2 py-1 bg-indigo-50 text-indigo-600 text-xs rounded">Sleep</span>
                                <span class="px-2 py-1 bg-purple-50 text-purple-600 text-xs rounded">Stress Relief</span>
                            </div>
                        </div>
                        
                        <!-- Product 4 -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-emerald-300 hover:shadow-lg transition-all">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-2xl">🌼</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Chrysanthemum Tea</h3>
                            <p class="mt-2 text-gray-600 text-sm">Relieve eye strain, reduce stress, and cool down naturally.</p>
                            <div class="mt-4 flex gap-2">
                                <span class="px-2 py-1 bg-yellow-50 text-yellow-600 text-xs rounded">Eye Health</span>
                                <span class="px-2 py-1 bg-orange-50 text-orange-600 text-xs rounded">Cooling</span>
                            </div>
                        </div>
                        
                        <!-- Product 5 -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-emerald-300 hover:shadow-lg transition-all">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-2xl">🏵️</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Marigold Tea</h3>
                            <p class="mt-2 text-gray-600 text-sm">Packed with antioxidants, promotes healing and skin health.</p>
                            <div class="mt-4 flex gap-2">
                                <span class="px-2 py-1 bg-amber-50 text-amber-600 text-xs rounded">Digestion</span>
                                <span class="px-2 py-1 bg-red-50 text-red-600 text-xs rounded">Anti-inflammatory</span>
                            </div>
                        </div>
                        
                        <!-- Product 6 -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 hover:border-emerald-300 hover:shadow-lg transition-all">
                            <div class="w-12 h-12 bg-fuchsia-100 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-2xl">🌺</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Amaranth Tea</h3>
                            <p class="mt-2 text-gray-600 text-sm">Rich in antioxidants, supports eye health and natural detox.</p>
                            <div class="mt-4 flex gap-2">
                                <span class="px-2 py-1 bg-fuchsia-50 text-fuchsia-600 text-xs rounded">Detox</span>
                                <span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-xs rounded">Immunity</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- View All Button -->
                    <div class="mt-12 text-center">
                        <a href="{{ route('packages') }}" class="inline-flex items-center px-8 py-4 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700 transition-colors">
                            View All Packages
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </section>

            <!-- ========================================
                 HOW IT WORKS SECTION
            ========================================= -->
            <section id="how-it-works" class="py-20 px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    
                    <!-- Section Header -->
                    <div class="text-center mb-16">
                        <span class="text-emerald-600 font-semibold text-sm uppercase tracking-wider">Process</span>
                        <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">How It Works</h2>
                        <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                            Simple steps to verify your tea and start earning rewards.
                        </p>
                    </div>
                    
                    <!-- Steps -->
                    <div class="space-y-8">
                        
                        <!-- Step 1 -->
                        <div class="flex gap-6 items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center font-bold text-lg">
                                1
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Scan QR Code</h3>
                                <p class="mt-2 text-gray-600">Each product has a unique QR code linking to its blockchain provenance record.</p>
                            </div>
                        </div>
                        
                        <!-- Step 2 -->
                        <div class="flex gap-6 items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center font-bold text-lg">
                                2
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Verify Origin</h3>
                                <p class="mt-2 text-gray-600">View the farm location, harvest date, processing details, and lab certificates.</p>
                            </div>
                        </div>
                        
                        <!-- Step 3 -->
                        <div class="flex gap-6 items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center font-bold text-lg">
                                3
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Earn Rewards</h3>
                                <p class="mt-2 text-gray-600">Participate in binary commissions, farming rewards, and leadership bonuses.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- RWA Info Box -->
                    <div class="mt-16 p-8 bg-blue-50 rounded-2xl border border-blue-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            {{ $settings->rwa_title ?? 'Tea as a Real World Asset (RWA)' }}
                        </h3>
                        <p class="text-gray-600">
                            {{ $settings->rwa_body ?? 'Turn physical tea products into tokenized, trackable assets that support growth and transparency. Every batch has a verifiable on-chain history—from seed to cup.' }}
                        </p>
                    </div>
                </div>
            </section>

            <!-- ========================================
                 TESTIMONIALS SECTION
            ========================================= -->
            <section id="testimonials" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
                <div class="max-w-6xl mx-auto">
                    
                    <!-- Section Header -->
                    <div class="text-center mb-16">
                        <span class="text-emerald-600 font-semibold text-sm uppercase tracking-wider">Testimonials</span>
                        <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-gray-900">What Our Community Says</h2>
                    </div>
                    
                    <!-- Testimonials Grid -->
                    @if(($testimonials ?? collect())->count() > 0)
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($testimonials as $testimonial)
                                <div class="bg-white p-6 rounded-xl border border-gray-200">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center">
                                            <span class="text-emerald-600 font-bold">{{ substr($testimonial->name, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900">{{ $testimonial->name }}</h4>
                                            @if($testimonial->title)
                                                <p class="text-sm text-gray-500">{{ $testimonial->title }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="text-gray-600 italic">"{{ $testimonial->quote }}"</p>
                                    <div class="mt-4 flex gap-1">
                                        @for($i = 0; $i < 5; $i++)
                                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12 bg-white rounded-xl border border-gray-200">
                            <p class="text-gray-500">Testimonials coming soon.</p>
                        </div>
                    @endif
                </div>
            </section>

            <!-- ========================================
                 CTA / CONTACT SECTION
            ========================================= -->
            <section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 bg-emerald-600">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl sm:text-4xl font-bold text-white">Ready to Start Your Wellness Journey?</h2>
                    <p class="mt-4 text-lg text-emerald-100 max-w-2xl mx-auto">
                        Join thousands who trust LeafChain for verified, organic flower teas and earn rewards along the way.
                    </p>
                    <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-emerald-700 font-bold rounded-lg hover:bg-gray-100 transition-colors">
                            Create Free Account
                        </a>
                        <a href="{{ route('packages') }}" class="px-8 py-4 bg-emerald-700 text-white font-bold rounded-lg border border-emerald-500 hover:bg-emerald-800 transition-colors">
                            View Packages
                        </a>
                    </div>
                </div>
            </section>
            
        </main>

        <!-- ============================================
             FOOTER
        ============================================= -->
        <footer class="bg-gray-900 text-gray-400">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                
                <!-- Footer Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    
                    <!-- Brand -->
                    <div class="col-span-2 md:col-span-1">
                        <h3 class="text-white text-xl font-bold mb-4">LeafChain</h3>
                        <p class="text-sm">Blockchain-powered botanical wellness with verified provenance and community rewards.</p>
                    </div>
                    
                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#home" class="hover:text-white transition-colors">Home</a></li>
                            <li><a href="#about" class="hover:text-white transition-colors">About</a></li>
                            <li><a href="#products" class="hover:text-white transition-colors">Products</a></li>
                            <li><a href="{{ route('packages') }}" class="hover:text-white transition-colors">Packages</a></li>
                        </ul>
                    </div>
                    
                    <!-- Account -->
                    <div>
                        <h4 class="text-white font-semibold mb-4">Account</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Login</a></li>
                            <li><a href="{{ route('register') }}" class="hover:text-white transition-colors">Register</a></li>
                            <li><a href="{{ route('dashboard') }}" class="hover:text-white transition-colors">Dashboard</a></li>
                        </ul>
                    </div>
                    
                    <!-- Legal -->
                    <div>
                        <h4 class="text-white font-semibold mb-4">Legal</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('terms.show') }}" class="hover:text-white transition-colors">Terms of Service</a></li>
                            <li><a href="{{ route('policy.show') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- Footer Bottom -->
                <div class="mt-12 pt-8 border-t border-gray-800">
                    <p class="text-center text-sm">&copy; {{ date('Y') }} LeafChain. All rights reserved.</p>
                </div>
            </div>
        </footer>
        
    </div>
</x-guest-layout>
