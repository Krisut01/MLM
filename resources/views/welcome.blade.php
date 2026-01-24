<x-guest-layout>
    <div class="min-h-screen bg-white text-gray-900">
        <header class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
            <a href="{{ route('landing') }}" class="font-black text-2xl text-emerald-700">LeafChain</a>
            <div class="flex items-center gap-3 text-sm">
            @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-black">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">Register</a>
                        @endif
                    @endauth
            @endif
            </div>
        </header>

        <!-- Hero -->
        <section class="max-w-7xl mx-auto px-6 py-12 md:py-16 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-black leading-tight">
                    {{ $settings?->hero_title ?? 'LeafChain' }}
                </h1>
                <p class="mt-5 text-lg text-gray-700 leading-relaxed">
                    {{ $settings?->hero_subtitle ?? 'Blockchain-powered botanical commerce with provenance, rewards, and community growth.' }}
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ $settings?->cta_link ?? '/register' }}" class="px-6 py-3 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700">
                        {{ $settings?->cta_text ?? 'Get Started' }}
                    </a>
                    <a href="{{ route('packages') }}" class="px-6 py-3 rounded-xl bg-white text-gray-900 font-semibold border border-gray-200 hover:bg-gray-50">
                        Browse Packages
                    </a>
                </div>
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div class="p-4 rounded-xl bg-white border border-gray-200 shadow-sm">
                        <div class="font-semibold text-gray-900">Verify origin</div>
                        <div class="text-gray-600">QR-based batch verification</div>
                    </div>
                    <div class="p-4 rounded-xl bg-white border border-gray-200 shadow-sm">
                        <div class="font-semibold text-gray-900">Earn rewards</div>
                        <div class="text-gray-600">Binary + farming + leadership</div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-3 bg-emerald-100 blur-2xl rounded-full"></div>
                <div class="relative rounded-3xl overflow-hidden border border-gray-100 bg-white shadow-lg">
                    @if($settings?->hero_image_path)
                        <img src="{{ asset('storage/'.$settings->hero_image_path) }}" alt="Hero" class="w-full h-80 object-cover">
                    @else
                        <div class="w-full h-80 bg-gradient-to-br from-emerald-50 to-blue-50 flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-6xl mb-2">🌿</div>
                                <div class="text-gray-600 font-semibold">Hero Image</div>
                                <div class="text-gray-500 text-xs">Upload from Admin → Landing Page CMS</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- RWA -->
        <section class="max-w-7xl mx-auto px-6 py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                <div class="rounded-3xl bg-white shadow-sm p-8 border border-gray-200">
                    <h2 class="text-2xl font-black text-gray-900">{{ $settings?->rwa_title ?? 'Tea as a Real World Asset (RWA)' }}</h2>
                    <p class="mt-4 text-gray-700 whitespace-pre-line leading-relaxed">{{ $settings?->rwa_body ?? '' }}</p>
                </div>
                <div class="rounded-3xl overflow-hidden border border-gray-200 shadow-sm bg-white">
                    @if($settings?->rwa_image_path)
                        <img src="{{ asset('storage/'.$settings->rwa_image_path) }}" alt="RWA" class="w-full h-96 object-cover">
                    @else
                        <div class="w-full h-96 bg-gradient-to-br from-amber-50 to-emerald-50 flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-5xl mb-2">🍵</div>
                                <div class="text-gray-700 font-semibold">RWA Section Image</div>
                                <div class="text-gray-500 text-xs">Upload from Admin → Landing Page CMS</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="max-w-7xl mx-auto px-6 pb-16">
            <div class="flex items-end justify-between mb-6">
                <h3 class="text-2xl font-black text-gray-900">Testimonials</h3>
                <span class="text-sm text-gray-500">Managed from the Admin panel</span>
            </div>
            @if(($testimonials ?? collect())->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($testimonials as $t)
                        <div class="rounded-2xl bg-white border border-gray-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100">
                                    @if($t->image_path)
                                        <img src="{{ asset('storage/'.$t->image_path) }}" class="w-full h-full object-cover" alt="{{ $t->name }}">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-500">👤</div>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">{{ $t->name }}</div>
                                    @if($t->title)<div class="text-sm text-gray-500">{{ $t->title }}</div>@endif
                                </div>
                            </div>
                            <p class="text-gray-700 leading-relaxed">“{{ $t->quote }}”</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="rounded-2xl bg-white border border-gray-200 shadow-sm p-8 text-center text-gray-600">
                    No testimonials yet. Add them via <span class="font-semibold">Admin → Testimonials</span>.
        </div>
        @endif
        </section>

        <footer class="border-t border-gray-200 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 py-8 text-sm text-gray-600 flex flex-col md:flex-row gap-3 justify-between">
                <div>© {{ date('Y') }} LeafChain</div>
                <div class="flex gap-4">
                    <a href="{{ route('terms.show') }}" class="hover:underline">Terms</a>
                    <a href="{{ route('policy.show') }}" class="hover:underline">Privacy</a>
                </div>
            </div>
        </footer>
    </div>
</x-guest-layout>

